<?
function transformJson($jsonString) {
    $data = json_decode($jsonString, true);

    $output = [
        "key" => $data["key"],
        "title" => $data["title"],
        "fields" => [
            [
                "key" => $data["fields"][0]["key"],
                "label" => $data["fields"][0]["label"],
                "name" => $data["fields"][0]["name"],
                "aria-label" => $data["fields"][0]["aria-label"],
                "type" => $data["fields"][0]["type"],
                "instructions" => $data["fields"][0]["instructions"],
                "required" => $data["fields"][0]["required"],
                "conditional_logic" => $data["fields"][0]["conditional_logic"],
                "wrapper" => $data["fields"][0]["wrapper"],
                "acfe_flexible_advanced" => $data["fields"][0]["acfe_flexible_advanced"],
                "acfe_flexible_stylised_button" => $data["fields"][0]["acfe_flexible_stylised_button"],
                "acfe_flexible_layouts_templates" => $data["fields"][0]["acfe_flexible_layouts_templates"],
                "acfe_flexible_layouts_previews" => $data["fields"][0]["acfe_flexible_layouts_previews"],
                "acfe_flexible_layouts_thumbnails" => $data["fields"][0]["acfe_flexible_layouts_thumbnails"],
                "acfe_flexible_layouts_settings" => $data["fields"][0]["acfe_flexible_layouts_settings"],
                "acfe_flexible_layouts_locations" => $data["fields"][0]["acfe_flexible_layouts_locations"],
                "acfe_flexible_async" => $data["fields"][0]["acfe_flexible_async"],
                "acfe_flexible_add_actions" => $data["fields"][0]["acfe_flexible_add_actions"],
                "acfe_flexible_remove_button" => $data["fields"][0]["acfe_flexible_remove_button"],
                "acfe_flexible_layouts_state" => $data["fields"][0]["acfe_flexible_layouts_state"],
                "acfe_flexible_modal_edit" => $data["fields"][0]["acfe_flexible_modal_edit"],
                "acfe_flexible_modal" => $data["fields"][0]["acfe_flexible_modal"],
                "acfe_flexible_grid" => $data["fields"][0]["acfe_flexible_grid"],
                "acfe_flexible_grid_container" => $data["fields"][0]["acfe_flexible_grid_container"],
                "layouts" => $data["fields"][0]["layouts"],
                "min" => $data["fields"][0]["min"],
                "max" => $data["fields"][0]["max"],
                "button_label" => $data["fields"][0]["button_label"],
                "acfe_field_group_condition" => $data["fields"][0]["acfe_field_group_condition"],
                "acfe_flexible_hide_empty_message" => $data["fields"][0]["acfe_flexible_hide_empty_message"],
                "acfe_flexible_empty_message" => $data["fields"][0]["acfe_flexible_empty_message"],
                "acfe_flexible_layouts_placeholder" => $data["fields"][0]["acfe_flexible_layouts_placeholder"]
            ]
        ],
        "location" => $data["location"],
        "menu_order" => $data["menu_order"],
        "position" => $data["position"],
        "style" => $data["style"],
        "label_placement" => $data["label_placement"],
        "instruction_placement" => $data["instruction_placement"],
        "hide_on_screen" => $data["hide_on_screen"],
        "active" => $data["active"],
        "description" => $data["description"],
        "show_in_rest" => $data["show_in_rest"],
        "acfe_autosync" => $data["acfe_autosync"],
        "acfe_form" => $data["acfe_form"],
        "acfe_display_title" => $data["acfe_display_title"],
        "acfe_meta" => $data["acfe_meta"],
        "acfe_note" => $data["acfe_note"]
    ];

    return json_encode([$output], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}