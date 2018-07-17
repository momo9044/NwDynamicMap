<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item',
        'label' => 'number',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'number,name,description,image,link,position_x,position_y',
        'iconfile' => 'EXT:dynamic_map/Resources/Public/Icons/tx_dynamicmap_domain_model_item.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, number, name, description, image, link, position_x, position_y',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, number, name, description, image, link, position_x, position_y, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_dynamicmap_domain_model_item',
                'foreign_table_where' => 'AND tx_dynamicmap_domain_model_item.pid=###CURRENT_PID### AND tx_dynamicmap_domain_model_item.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
		'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
		'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'number' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item.number',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],

        'show_in_fe' => [
            'exclude' => true,
            'label' => 'active',
            'config' => [
                'type' => 'check',
                'eval' => 'int'
            ]
        ],
	    'name' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item.name',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],

        'circle_bg_color' => [
            'exclude' => true,
            'label' => 'Kreis Hintergrundsfarbe',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],

        'circle_border_color' => [
            'exclude' => true,
            'label' => 'Kreis Rahmenfarbe',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],

	    'description' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item.description',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
	    ],
	    'image' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item.image',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'image',
			    [
			        'appearance' => [
			            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			        ],
			        'foreign_types' => [
			            '0' => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ]
			        ],
			        'maxitems' => 1
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	    ],
	    'link' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item.link',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'position_x' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item.position_x',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2'
			]
	    ],
	    'position_y' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:dynamic_map/Resources/Private/Language/locallang_db.xlf:tx_dynamicmap_domain_model_item.position_y',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2'
			]
	    ],
        'stage' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
