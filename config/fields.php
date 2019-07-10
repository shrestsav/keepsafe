<?php

return [
  'job_event' => [
    'Job Details' => [
      'priority' => [
        'display_name' => 'Priority',
        'col' => '1',
        'type' =>  'number',
      ],
      'superslip' => [
        'display_name' => 'Superslip',
        'col' => '1',
        'type' =>  'checkbox',
      ],
      'date' => [
        'display_name' => 'Date',
        'col' => '2',
        'type' =>  'date',
      ],
      'status' => [
        'display_name' => 'Status',
        'col' => '2',
        'type' =>  'select',
      ],
      'type' => [
        'display_name' => 'Type',
        'col' => '2',
        'type' =>  'select',
      ],
      'vehicle' => [
        'display_name' => 'Vehicle',
        'col' => '2',
        'type' =>  'select',
      ],
      'boom_lift_req' => [
        'display_name' => 'Keepsafe Boom Lift Req',
        'col' => '2',
        'type' =>  'checkbox',
      ],
      'rail_rate' => [
        'display_name' => 'Charge Rail Rate',
        'col' => '2',
        'type' =>  'number',
      ],
      'platform_rate' => [
        'display_name' => 'Charge Rate Platform',
        'col' => '2',
        'type' =>  'number',
      ],
      'int_platform_rate' => [
        'display_name' => 'Charge Rate Int. Platform',
        'col' => '2',
        'type' =>  'number',
      ],
      'purchase_order' => [
        'display_name' => 'Purchase Order',
        'col' => '2',
        'type' =>  'text',
      ],
      'ref' => [
        'display_name' => 'Ref',
        'col' => '2',
        'type' =>  'text',
      ],
      'off_hired' => [
        'display_name' => 'Off Hired',
        'col' => '2',
        'type' =>  'custom',
      ],
      'hire_days' => [
        'display_name' => 'Hired Days',
        'col' => '2',
        'type' =>  'custom',
      ],
      'location' => [
        'display_name' => 'Location',
        'col' => '2',
        'type' =>  'text',
      ],
      'note' => [
        'display_name' => 'Note, (available upon log-in)',
        'col' => '6',
        'type' =>  'textarea',
      ],
    ],
    'General Details' => [
      'type_of_install' => [
        'display_name' => "Type of Install",
        'col' => '2',
        'type' =>  'select',
      ],
      'type_of_roof' => [
        'display_name' => 'Type of Roof',
        'col' => '2',
        'type' =>  'select',
      ],
      'edge_protection_required' => [
        'display_name' => 'Edge protection required',
        'col' => '2',
        'type' =>  'checkbox',
      ],
      'total_m_Rail' => [
        'display_name' => "Total M's Rail",
        'col' => '2',
        'type' =>  'number',
      ],
      'total_m_std_platform' => [
        'display_name' => "Total M's STD Platform",
        'col' => '2',
        'type' =>  'number',
      ],
      'total_m_internal_platform' => [
        'display_name' => "Total M's Internal Platform",
        'col' => '2',
        'type' =>  'number',
      ],
      'total_m_edge_void_1_rail' => [
        'display_name' => "Total M's Edge Void 1 Rail",
        'col' => '2',
        'type' =>  'number',
      ],
      'total_m_edge_void_2_rail' => [
        'display_name' => "Total M's Edge Void 2 Rail",
        'col' => '2',
        'type' =>  'number',
      ],
      'total_m_mesh_guard' => [
        'display_name' => "Total M's Mesh Gaurd",
        'col' => '2',
        'type' =>  'number',
      ],
      'total_m_kickboards' => [
        'display_name' => "Total M's Kickboards",
        'col' => '2',
        'type' =>  'number',
      ],
      'platform_charge_type' => [
        'display_name' => "Platform Charge Type",
        'col' => '2',
        'type' =>  'radio',
        'one' =>  'Commercial',
        'two' =>  'Domestic',
      ],
      'pitch' => [
        'display_name' => "Pitch",
        'col' => '1',
        'type' =>  'select',
      ],
      'height' => [
        'display_name' => "Height",
        'col' => '1',
        'type' =>  'select',
      ],
      'install_sign' => [
        'display_name' => "Install Sign",
        'col' => '1',
        'type' =>  'checkbox',
      ],
      'install_banner' => [
        'display_name' => "Install Banner",
        'col' => '1',
        'type' =>  'checkbox',
      ],
      'panel_patch' => [
        'display_name' => "Panel Patch",
        'col' => '1',
        'type' =>  'checkbox',
      ],
      'strapping_tools_etc' => [
        'display_name' => "Strapping Tools etc",
        'col' => '1',
        'type' =>  'checkbox',
      ],
      'extension_ladder' => [
        'display_name' => "Extension Ladder",
        'col' => '1',
        'type' =>  'checkbox',
      ],
      'step_ladder' => [
        'display_name' => "Step Ladder",
        'col' => '1',
        'type' =>  'checkbox',
      ],
    ],
    'Number of Rails Req' => [
      '6.5s' => [
        'display_name' => "6.5s",
        'col' => '2',
        'type' =>  '2text',
      ],
      '4.5s' => [
        'display_name' => '4.5s',
        'col' => '2',
        'type' =>  '2text',
      ],
      '3.25s' => [
        'display_name' => '3.25s',
        'col' => '2',
        'type' =>  '2text',
      ],
      '2s' => [
        'display_name' => "2s",
        'col' => '2',
        'type' =>  '2text',
      ],
    ],
    'Breakdown of M Required' => [
      'purlin_m' => [
        'display_name' => "Purlin Ms",
        'col' => '2',
        'type' =>  'number',
      ],
      'tilt_up_m' => [
        'display_name' => 'Tilt Up Ms',
        'col' => '2',
        'type' =>  'number',
      ],
      'tilt_up_adjustable_m' => [
        'display_name' => 'Tilt Up Adjustable Ms',
        'col' => '2',
        'type' =>  'number',
      ],
      'other' => [
        'display_name' => 'Other',
        'col' => '2',
        'type' =>  'number',
      ],
      'note' => [
        'display_name' => 'Note',
        'col' => '4',
        'type' =>  'textarea',
      ],
    ],
    'Brackets Req' => [
      'std_purlin' => [
        'display_name' => "STD Purlin",
        'col' => '2',
        'type' =>  'number',
      ],
      'lge_purlin' => [
        'display_name' => 'LGE Purlin',
        'col' => '2',
        'type' =>  'number',
      ],
      'purlin_clip' => [
        'display_name' => 'Purlin Clip',
        'col' => '2',
        'type' =>  'number',
      ],
      'droppers' => [
        'display_name' => 'Droppers',
        'col' => '2',
        'type' =>  'number',
      ],
      'balcony_brackets' => [
        'display_name' => 'Balcony Brackets',
        'col' => '2',
        'type' =>  'number',
      ],
      'tilt_up' => [
        'display_name' => 'Tilt Up',
        'col' => '2',
        'type' =>  'number',
      ],
      'adjustable_tilt_up' => [
        'display_name' => 'Adjustable Tilt Up',
        'col' => '2',
        'type' =>  'number',
      ],
      'uprights' => [
        'display_name' => 'Uprights',
        'col' => '2',
        'type' =>  'number',
      ],
      'short_uprights' => [
        'display_name' => 'Short Uprights',
        'col' => '2',
        'type' =>  'number',
      ],
      'angled_uprights' => [
        'display_name' => 'Angled Uprights',
        'col' => '2',
        'type' =>  'number',
      ],
      'extra_lge_bolts' => [
        'display_name' => 'Extra LGE Bolts',
        'col' => '2',
        'type' =>  'number',
      ],
      'lge_bolts' => [
        'display_name' => 'LGE Bolts',
        'col' => '2',
        'type' =>  'number',
      ],
      'sml_bolts' => [
        'display_name' => 'SML Bolts',
        'col' => '2',
        'type' =>  'number',
      ],
      'bolts_batch_no' => [
        'display_name' => 'Bolts Batch No.',
        'col' => '2',
        'type' =>  'number',
      ],
      'generator' => [
        'display_name' => 'Generator',
        'col' => '2',
        'type' =>  'number',
      ],
    ],
    'Brackets Req Const' => [
      'truss_clamps' => [
        'display_name' => "Truss Clamps",
        'col' => '2',
        'type' =>  'number',
      ],
      'tclamp_attach_straight' => [
        'display_name' => 'TClamp Attach. Straight',
        'col' => '2',
        'type' =>  'number',
      ],
      'tclamp_attach_angled' => [
        'display_name' => 'TClamp Attach. Angled',
        'col' => '2',
        'type' =>  'number',
      ],
      'metal_frame_sets' => [
        'display_name' => 'Metal Frame Sets',
        'col' => '2',
        'type' =>  'number',
      ],
      'top_plate_hook' => [
        'display_name' => 'Top Plate Hook',
        'col' => '2',
        'type' =>  'number',
      ],
      'paraphets' => [
        'display_name' => 'Paraphets',
        'col' => '2',
        'type' =>  'number',
      ],
      'uprights' => [
        'display_name' => 'Uprights',
        'col' => '2',
        'type' =>  'number',
      ],
      'short_uprights' => [
        'display_name' => 'Short Uprights',
        'col' => '2',
        'type' =>  'number',
      ],
      'angled_uprights' => [
        'display_name' => 'Angled Uprights',
        'col' => '2',
        'type' =>  'number',
      ],
    ],
    'Brackets Req Reno' => [
      'angle_resto' => [
        'display_name' => "Angle Resto",
        'col' => '2',
        'type' =>  'number',
      ],
      'straight_resto' => [
        'display_name' => 'Straight Resto',
        'col' => '2',
        'type' =>  'number',
      ],
      'std_metal_roof' => [
        'display_name' => 'STD Metal Roof',
        'col' => '2',
        'type' =>  'number',
      ],
      'lge_metal_roof' => [
        'display_name' => 'LGE Metal Roof',
        'col' => '2',
        'type' =>  'number',
      ],
      'fibro_roof' => [
        'display_name' => 'Fibro Roof',
        'col' => '2',
        'type' =>  'number',
      ],
      'metal_roof_anchors' => [
        'display_name' => 'Metal Roof Anchors',
        'col' => '2',
        'type' =>  'number',
      ],
      'on_roof_bracket' => [
        'display_name' => 'On Roof Bracket',
        'col' => '2',
        'type' =>  'number',
      ],
      'on_roof_bracket_ext' => [
        'display_name' => 'On Roof Bracket Ext',
        'col' => '2',
        'type' =>  'number',
      ],
      'clip_lock_set' => [
        'display_name' => 'Clip Lock Set',
        'col' => '2',
        'type' =>  'number',
      ],
    ],
    'Brackets Req Pole' => [
      '6m_sweyged' => [
        'display_name' => "6m Sweyged",
        'col' => '2',
        'type' =>  'text',
      ],
      '3m_extension' => [
        'display_name' => '3m Extension',
        'col' => '2',
        'type' =>  'text',
      ],
      '2m_extension' => [
        'display_name' => '2m Extension',
        'col' => '2',
        'type' =>  'text',
      ],
      '1m_extension' => [
        'display_name' => '1m Extension',
        'col' => '2',
        'type' =>  'text',
      ],
      'straight_joining_couplers' => [
        'display_name' => 'Straight Joining Couplers',
        'col' => '2',
        'type' =>  'text',
      ],
      'diagonal_joining_couplers' => [
        'display_name' => 'Diagonal Joining Couplers',
        'col' => '2',
        'type' =>  'text',
      ],
      'gutter_brackets' => [
        'display_name' => 'Gutter Brackets',
        'col' => '2',
        'type' =>  'text',
      ],
      'bracket_arms' => [
        'display_name' => 'Bracket Arms',
        'col' => '2',
        'type' =>  'text',
      ],
      'bracket_arms_facia' => [
        'display_name' => 'Bracket Arms Facia',
        'col' => '2',
        'type' =>  'text',
      ],
      'left_gable_brackets' => [
        'display_name' => 'Left Gable Brackets',
        'col' => '2',
        'type' =>  'text',
      ],
      'right_gable_brackets' => [
        'display_name' => 'Right Gable Brackets',
        'col' => '2',
        'type' =>  'text',
      ],
    ],
    'On Roof Systems' => [
      'on_roof_bracket' => [
        'display_name' => "On Roof Bracket",
        'col' => '2',
        'type' =>  'number',
      ],
      'on_roof_bracket_ext' => [
        'display_name' => 'On Roof Bracket Ext',
        'col' => '2',
        'type' =>  'number',
      ],
      'clip_lock_set' => [
        'display_name' => 'Clip Lock Set',
        'col' => '2',
        'type' =>  'number',
      ],
      'paraphet_floor_clamp' => [
        'display_name' => 'Paraphet/Floor Clamp',
        'col' => '2',
        'type' =>  'number',
      ],
    ],
    'Universal Brackets' => [
      'posts' => [
        'display_name' => "Posts",
        'col' => '2',
        'type' =>  'number',
      ],
      'universals' => [
        'display_name' => 'Universals',
        'col' => '2',
        'type' =>  'number',
      ],
      'wall_universals' => [
        'display_name' => 'Wall Universals',
        'col' => '2',
        'type' =>  'number',
      ],
      'gable_universal' => [
        'display_name' => 'Gable Universal',
        'col' => '2',
        'type' =>  'number',
      ],
      'access_gate' => [
        'display_name' => 'Access Gate',
        'col' => '2',
        'type' =>  'number',
      ],
      '30x30x750' => [
        'display_name' => '30x30x750',
        'col' => '2',
        'type' =>  'number',
      ],
      '30x30x1500' => [
        'display_name' => '30x30x1500',
        'col' => '2',
        'type' =>  'number',
      ],
      '30x30x2000' => [
        'display_name' => '30x30x2000',
        'col' => '2',
        'type' =>  'number',
      ],
      'mesh_guards' => [
        'display_name' => 'Mesh Gaurds',
        'col' => '2',
        'type' =>  'number',
      ],
      'kickboards' => [
        'display_name' => 'Kickboards',
        'col' => '2',
        'type' =>  'number',
      ],
    ],
    'Notes' => [
      'N' => [
        'display_name' => "Note",
        'col' => '12',
        'type' =>  'textarea',
      ],
    ],
  ],
  'client_details' => [
    'Client Information' => [
      'name' => [
        'display_name' => 'Client Name',
        'col' => '4',
        'type' =>  'text',
      ],
      'address' => [
        'display_name' => 'Address',
        'col' => '4',
        'type' =>  'text',
      ],
      'suburb' => [
        'display_name' => 'Suburb',
        'col' => '4',
        'type' =>  'text',
      ],
      'state' => [
        'display_name' => 'State',
        'col' => '3',
        'type' =>  'select',
      ],
      'postcode' => [
        'display_name' => 'Postcode',
        'col' => '3',
        'type' =>  'text',
      ],
      'phone' => [
        'display_name' => 'Phone',
        'col' => '3',
        'type' =>  'text',
      ],
      'fax' => [
        'display_name' => 'Fax',
        'col' => '3',
        'type' =>  'text',
      ],
      'account_limit' => [
        'display_name' => 'Account Limit',
        'col' => '3',
        'type' =>  'number',
      ],
    ],
    'Billing Information' => [
      'billing_email' => [
        'display_name' => 'Billing Email',
        'col' => '4',
        'type' =>  'text',
      ],
      'billing_address' => [
        'display_name' => 'Billing Address',
        'col' => '4',
        'type' =>  'text',
      ],
      'billing_suburb' => [
        'display_name' => 'Billing Suburb',
        'col' => '4',
        'type' =>  'text',
      ],
      'billing_state' => [
        'display_name' => 'Billing State',
        'col' => '4',
        'type' =>  'select',
      ],
      'billing_postcode' => [
        'display_name' => 'Billing Postcode',
        'col' => '4',
        'type' =>  'text',
      ],
    ],
    'Other Information' => [
      'website' => [
        'display_name' => 'Website',
        'col' => '4',
        'type' =>  'text',
      ],
      'abn' => [
        'display_name' => 'A.B.N',
        'col' => '4',
        'type' =>  'text',
      ],
      'charge_rate' => [
        'display_name' => 'Charge Rate',
        'col' => '4',
        'type' =>  'number',
      ],
      'footnote' => [
        'display_name' => 'Footnote',
        'col' => '12',
        'type' =>  'textarea',
      ],
    ],
  ],
  'pantry_price' => [
    'Pantry Price List' => [
      'CSFEP' => [
        'display_name' => 'Construction Steel Frame Edge Protection',
        'col' => '4',
        'type' =>  'number',
      ],
      'CTFEP' => [
        'display_name' => 'Construction Timber Frame Edge Protection',
        'col' => '4',
        'type' =>  'number',
      ],
      'RSEP' => [
        'display_name' => 'Re-roof Standard Edge Protection',
        'col' => '4',
        'type' =>  'number',
      ],
      'RPEP' => [
        'display_name' => 'Re-roof Pole Edge Protection',
        'col' => '3',
        'type' =>  'number',
      ],
      'REP' => [
        'display_name' => 'Renovation Edge Protection',
        'col' => '3',
        'type' =>  'number',
      ],
      'RP' => [
        'display_name' => 'Residential Platform',
        'col' => '3',
        'type' =>  'number',
      ],
      'STDCP' => [
        'display_name' => 'STD Commercial Platform',
        'col' => '3',
        'type' =>  'number',
      ],
      'ICP' => [
        'display_name' => 'Internal Commercial Platform',
        'col' => '3',
        'type' =>  'number',
      ],
      'CEP' => [
        'display_name' => 'Commercial Edge Protection',
        'col' => '3',
        'type' =>  'number',
      ],
      'BL' => [
        'display_name' => 'Boom Lift',
        'col' => '3',
        'type' =>  'number',
      ],
      'CO' => [
        'display_name' => 'Charge On, 1:Install - 2:Dismantle',
        'col' => '3',
        'type' =>  'number',
      ],
      'EVOR' => [
        'display_name' => 'Edge Void 1 Rail',
        'col' => '3',
        'type' =>  'number',
      ],
      'EVTR' => [
        'display_name' => 'Edge Void 2 Rail',
        'col' => '3',
        'type' =>  'number',
      ],
      'K' => [
        'display_name' => 'Kickboards',
        'col' => '3',
        'type' =>  'number',
      ],
      'MG' => [
        'display_name' => 'Mesh Guard',
        'col' => '3',
        'type' =>  'number',
      ],
      'COF' => [
        'display_name' => 'Call Out Fee',
        'col' => '3',
        'type' =>  'number',
      ],
      'ERC' => [
        'display_name' => 'Equipment Recovery Charge',
        'col' => '3',
        'type' =>  'number',
      ],
      'MMC' => [
        'display_name' => 'Minimum Meter Charges',
        'col' => '3',
        'type' =>  'number',
      ],
      'HCR' => [
        'display_name' => 'Hire Charge Rail',
        'col' => '3',
        'type' =>  'number',
      ],
      'HCP' => [
        'display_name' => 'Hire Charge Platform',
        'col' => '3',
        'type' =>  'number',
      ],
      'HCEVO' => [
        'display_name' => 'Hire Charge Edge Void 1',
        'col' => '3',
        'type' =>  'number',
      ],
      'HCEVT' => [
        'display_name' => 'Hire Charge Edge Void 2',
        'col' => '3',
        'type' =>  'number',
      ],
      'HCEK' => [
        'display_name' => 'Hire Charge Edge Kickboard',
        'col' => '3',
        'type' =>  'number',
      ],
      'HCEMG' => [
        'display_name' => 'Hire Charge Edge Mesh Guard',
        'col' => '3',
        'type' =>  'number',
      ],
      'DW' => [
        'display_name' => 'Damage Waiver(%)',
        'col' => '3',
        'type' =>  'number',
      ],
      'Note' => [
        'display_name' => 'Note',
        'col' => '3',
        'type' =>  'textarea',
      ],
    ],
  ],
];
