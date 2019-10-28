<?php

return array(

    'cache'      => [

        
        'enable'   => true,

  
        'driver'   => 'memory',

        'settings' => [

            'memoryCacheSize' => '32MB',
            'cacheTime'       => 600

        ],

   
        'memcache' => [

            'host' => 'localhost',
            'port' => 11211,

        ],


        'dir'      => storage_path('cache')
    ],

    'properties' => [
        'creator'        => 'Maatwebsite',
        'lastModifiedBy' => 'Maatwebsite',
        'title'          => 'Spreadsheet',
        'description'    => 'Default spreadsheet export',
        'subject'        => 'Spreadsheet export',
        'keywords'       => 'maatwebsite, excel, export',
        'category'       => 'Excel',
        'manager'        => 'Maatwebsite',
        'company'        => 'Maatwebsite',
    ],

  
    'sheets'     => [

        
        'pageSetup' => [
            'orientation'           => 'portrait',
            'paperSize'             => '9',
            'scale'                 => '100',
            'fitToPage'             => false,
            'fitToHeight'           => true,
            'fitToWidth'            => true,
            'columnsToRepeatAtLeft' => ['', ''],
            'rowsToRepeatAtTop'     => [0, 0],
            'horizontalCentered'    => false,
            'verticalCentered'      => false,
            'printArea'             => null,
            'firstPageNumber'       => null,
        ],
    ],

   

    'creator'    => 'Maatwebsite',

    'csv'        => [
      

        'delimiter'   => ',',

        'enclosure'   => '"',


        'line_ending' => "\r\n",

       
        'use_bom' => false
    ],

    'export'     => [

     
        'autosize'                    => true,

      
        'autosize-method'             => PHPExcel_Shared_Font::AUTOSIZE_METHOD_APPROX,

    
        'generate_heading_by_indices' => true,

      
        'merged_cell_alignment'       => 'left',

      
        'calculate'                   => false,

      
        'includeCharts'               => false,

       
        'sheets'                      => [

        
            'page_margin'          => false,

          
            'nullValue'            => null,

            'startCell'            => 'A1',

            'strictNullComparison' => false
        ],

    

        'store'                       => [

           
            'path'       => storage_path('exports'),

          
            'returnInfo' => false

        ],

       
        'pdf'                         => [

            'driver'  => 'DomPDF',

           
            'drivers' => [

              
                'DomPDF' => [
                    'path' => base_path('vendor/dompdf/dompdf/')
                ],

                'tcPDF'  => [
                    'path' => base_path('vendor/tecnick.com/tcpdf/')
                ],

                
                'mPDF'   => [
                    'path' => base_path('vendor/mpdf/mpdf/')
                ],
            ]
        ]
    ],

    'filters'    => [
     

        'registered' => [
            'chunk' => 'Maatwebsite\Excel\Filters\ChunkReadFilter'
        ],

     

        'enabled'    => []
    ],

    'import'     => [

     

        'heading'                 => 'slugged',

   
        'startRow'                => 1,

   

        'separator'               => '_',


        'includeCharts'           => false,

     
        'to_ascii'                => true,

        

        'encoding'                => [

            'input'  => 'UTF-8',
            'output' => 'UTF-8'

        ],

      
      

        'calculate'               => true,

      

        'ignoreEmpty'             => false,

      
        'force_sheets_collection' => false,

      
        'dates'                   => [

            
            'enabled' => true,

           
            'format'  => false,

        
            'columns' => []
        ],

    
        'sheets'                  => [

          

            'test' => [

                'firstname' => 'A2'

            ]

        ]
    ],

    'views'      => [

      

        'styles' => [

            'th'     => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

           
            'strong' => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

            'b'      => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

           
            'i'      => [
                'font' => [
                    'italic' => true,
                    'size'   => 12,
                ]
            ],

           
            'h1'     => [
                'font' => [
                    'bold' => true,
                    'size' => 24,
                ]
            ],

            'h2'     => [
                'font' => [
                    'bold' => true,
                    'size' => 18,
                ]
            ],

           
            'h3'     => [
                'font' => [
                    'bold' => true,
                    'size' => 13.5,
                ]
            ],

         
            'h4'     => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

           
            'h5'     => [
                'font' => [
                    'bold' => true,
                    'size' => 10,
                ]
            ],

          
            'h6'     => [
                'font' => [
                    'bold' => true,
                    'size' => 7.5,
                ]
            ],

          
            'a'      => [
                'font' => [
                    'underline' => true,
                    'color'     => ['argb' => 'FF0000FF'],
                ]
            ],

       
            'hr'     => [
                'borders' => [
                    'bottom' => [
                        'style' => 'thin',
                        'color' => ['FF000000']
                    ],
                ]
            ]
        ]

    ]

);
