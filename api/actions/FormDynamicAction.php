<?php

namespace api\actions;

use api\models\form\DynamicForm;
use Yii;
use yii\base\Action;

class FormDynamicAction extends Action
{

    /** @var array */
    private $sectionsData;

    /** @var string */
    public $dataFile = 'form_data_seis';

    public $json = false;

    public function run()
    {
        if (empty($this->sectionsData)) {
            Yii::$app->session->setFlash('error', 'The section is missing try again, to generate the correct form information.');
            return $this->controller->render('message', [
                'algo salio mal'
            ]);
        }

        [$sections, $attributes, $rules] = $this->mapEstructure();

        if ($this->json) {
            return $this->controller->asJson([
                'sections' => $sections,
                'attributes' => $attributes,
                'rules' => $rules,
            ]);
        }

        $dynamicForm = new DynamicForm([
            'fields' => $attributes,
            'fieldsRules' => $rules,
        ]);

        if ($dynamicForm->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', 'Loaded the data information.');
        }

        return $this->controller->render('dynamic', [
            'dynamicForm' => $dynamicForm,
            'sections'  => $sections,
        ]);
    }

    protected function beforeRun()
    {
        /** @var array[] */
        $formData = require_once(Yii::getAlias("@common/data/{$this->dataFile}.php"));

        $this->sectionsData = array_filter($formData['secciones'], function (array $section) {
            return count($section) > 2;
        });
        return parent::beforeRun();
    }

    private function mapEstructure()
    {
        $section = current($this->sectionsData);
        $rules = [
            'required' => [],
            'string' => [],
            'number' => [],
        ];

        $sections = [];

        $attributes = $this->mapAttributes($section, $rules);
        $sections[] = [
            'title'  => $section['secNombre'],
            'fields' => $attributes,
            'subtitle' => $section['secDescripcion'],
        ];

        foreach ($section['subSecciones'] as $key => $subSection) {
            $subAttributes = $this->mapAttributes($subSection, $rules, chr(97 + $key));

            $sections[] = [
                'title'  => $subSection['secNombre'],
                'subtitle' => $subSection['secDescripcion'],
                'fields' => $subAttributes,
            ];
            $attributes = array_merge($attributes, $subAttributes);
        }

        return [$sections, $attributes, $rules];
    }

    private function mapAttributes(array $section, array &$rules, string $codPrefix = '')
    {
        $attributes = [];
        foreach ($section['campos'] as $campo) {
            $coreCode = $codPrefix . (empty($codPrefix)
                ? $campo['camCodigoCore'] : ucfirst($campo['camCodigoCore'])
            );

            $attributes[] = [
                'col'   => $campo['camNumeroColumnas'],
                'code'  => $coreCode,
                'label' => $campo['camOcultarEtiqueta'] === '0'
                    ? $campo['camNombre'] : '',
                'placeholder' => $campo['camEjemplo'],
                'widget' => $campo['camWidget'] ?? [],
                'isInput' => !in_array($campo['camTipo'], ['information'])
            ];

            if ($campo['camObligatorio'] === '1') {
                $rules['required'][] = $coreCode;
            }

            if (in_array("3", empty($campo['camValidaciones']) ? [] : $campo['camValidaciones'])) {
                $rules['number'][] = $coreCode;
            }
        }
        return $attributes;
    }
}
