<?php

return [
    'forCodigoFormulario' => 'cueElec2',
    'forTitulo' => 'Creacion cuenta virtual',
    'forEstado' => 'N',
    'forTiempoVigencia' => '10',
    'forLogotipo' => 'logo_principal.png',
    'forUrlFinalizar' => 'https://mazuay-pruebas-nuevo.us-west-2.elasticbeanstalk.com/mazvirtual',
    'forParametros' => [
        'forColorPrincipal' => '#ffffff',
        'forColorSecundario' => '#f9f9f9',
        'forColorHijoSeccion' => '#a8a3a3',
        'forColorTextoPrincipal' => '#1e62b0',
        'forColorTextoSecundario' => '#8f9bb3',
        'forColorBotonPrincipal' => '#204c95',
        'forColorBotonSecundario' => '#a3a3a3',
        'forColorBarra' => '#17bce0',
        'forColorAuxiliar' => '#828282',
    ],
    'formSecciones' => [
        7 => [
            'secId' => '619272b1cb5a00005f002bc9',
            'secEstado' => 'N',
            'secPosicion' => '8',
            'label' => 'Residencia Fiscal',
        ],
    ],
    'secciones' => [
        0 => [
            'id' => '618df5cea807eb2604a0855b',
            'secPosicion' => 1,
        ],
        1 => [
            'id' => '618f4b36245aeb6ca71637fb',
            'secPosicion' => 2,
        ],
        2 => [
            'id' => '618f4aea245aeb6ca71637fa',
            'secPosicion' => 3,
        ],
        3 => [
            'id' => '61919b9eafcd247d650d0a24',
            'secPosicion' => 4,
        ],
        4 => [
            'id' => '6191ba70cb5a00005f002bb9',
            'secPosicion' => 5,
        ],
        5 => [
            'id' => '6191f0e5cb5a00005f002bc1',
            'secPosicion' => 6,
        ],
        6 => [
            'id' => '61927261cb5a00005f002bc8',
            'secPosicion' => 7,
        ],
        7 => [
            'id' => '619272b1cb5a00005f002bc9',
            'secNombre' => 'Residencia Fiscal',
            'secDescripcion' => '',
            'secServicioWeb' => 'http://middleware-desarrollo-74.us-west-2.elasticbeanstalk.com/frontend/web/index.php?r=crearcuentaelectronica/enviar-datos-core-entidad&empresa=mazuay&plataforma=WEB',
            'secTipoConsumoServicioWeb' => '2',
            'secEstado' => 'N',
            'secPosicion' => 8,
            'secNivel' => '0',
            'secGuardarDatos' => '1',
            'secPadre' => NULL,
            'campos' => [
                0 => [
                    '_id' => '61927010cb5a00005f002bc5',
                    'empCodigo' => 'mazuay',
                    'camCodigoCore' => 'cliResidenciaFiscal',
                    'camNombre' => '¿Tiene residencia fiscal en otro país?',
                    'camEstado' => 'N',
                    'camTipo' => 'checkbox',
                    'camObligatorio' => '1',
                    'camEditable' => '1',
                    'camOcultarEtiqueta' => '0',
                    'camNumeroColumnas' => '12',
                    'camEjemplo' => '',
                    'camDescripcion' => '',
                    'camTiempoDuracion' => '',
                    'camMaxSize' => '',
                    'camFormato' => '',
                    'camLongitud' => '',
                    'camUpperCase' => '',
                    'camPrecargarDatos' => '0',
                    'camCodigoPrecargaDatos' => 'prompt',
                    'camValidaciones' => '',
                    'camDependiente' => '0',
                    'camCodigoDependiente' => '',
                    'camCodigoDependienteList' => '',
                    'camListaOpciones' => [
                        0 => [
                            'clave' => '1',
                            'valor' => 'Si',
                        ],
                        1 => [
                            'clave' => '0',
                            'valor' => 'No',
                        ],
                    ],
                    'formCodigo' => 'cueElec',
                    'camPos' => 1,
                ],
                1 => [
                    '_id' => '619270c6cb5a00005f002bc6',
                    'empCodigo' => 'mazuay',
                    'camCodigoCore' => 'cliResidenciaFiscalPais',
                    'camNombre' => 'Seleccione el país del contribuyente',
                    'camEstado' => 'N',
                    'camTipo' => 'lista',
                    'camObligatorio' => '1',
                    'camEditable' => '1',
                    'camOcultarEtiqueta' => '0',
                    'camNumeroColumnas' => '6',
                    'camEjemplo' => 'Seleccionar país ',
                    'camDescripcion' => '',
                    'camTiempoDuracion' => '',
                    'camMaxSize' => '',
                    'camFormato' => '',
                    'camLongitud' => '',
                    'camUpperCase' => '',
                    'camPrecargarDatos' => '1',
                    'camCodigoPrecargaDatos' => 'paises',
                    'camValidaciones' => '',
                    'camDependiente' => '1',
                    'camCodigoDependiente' => 'cliResidenciaFiscal',
                    'camCodigoDependienteList' => '1',
                    'camListaOpciones' => NULL,
                    'formCodigo' => 'cueElec',
                    'camPos' => 2,
                ],
                2 => [
                    '_id' => '619270ffcb5a00005f002bc7',
                    'empCodigo' => 'mazuay',
                    'camCodigoCore' => 'cliResidenciaFiscalNum',
                    'camNombre' => 'Número de contribuyente',
                    'camEstado' => 'N',
                    'camTipo' => 'text',
                    'camObligatorio' => '1',
                    'camEditable' => '1',
                    'camOcultarEtiqueta' => '0',
                    'camNumeroColumnas' => '6',
                    'camEjemplo' => '',
                    'camDescripcion' => '',
                    'camTiempoDuracion' => '',
                    'camMaxSize' => '',
                    'camFormato' => '',
                    'camLongitud' => '',
                    'camUpperCase' => '',
                    'camPrecargarDatos' => '0',
                    'camCodigoPrecargaDatos' => 'prompt',
                    'camValidaciones' => '',
                    'camDependiente' => '1',
                    'camCodigoDependiente' => 'cliResidenciaFiscal',
                    'camCodigoDependienteList' => '1',
                    'camListaOpciones' => NULL,
                    'formCodigo' => 'cueElec',
                    'camPos' => 3,
                ],
            ],
            'subSecciones' => [],
        ],
        8 => [
            'id' => '61928aeecb5a00005f002bd1',
            'secPosicion' => 9,
        ],
        9 => [
            'id' => '61928b45cb5a00005f002bd3',
            'secPosicion' => 10,
        ],
        10 => [
            'id' => '61929f6ecb5a00005f002bd6',
            'secPosicion' => 11,
        ],
    ],
];
