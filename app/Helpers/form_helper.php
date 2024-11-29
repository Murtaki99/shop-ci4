<?php
if (!function_exists('form_input')) {
    /**
     * Custom Input Form
     *
     * @param string $name       Nama input
     * @param string $value      Nilai default input
     * @param string $errors     Pesan error jika ada
     * @param string $type       Tipe input (default: text)
     * @param string $ph         Placeholder untuk input
     * @param string $title      Label untuk input
     * @param array  $attributes Atribut tambahan untuk input
     * @return string
     */
    function form_input(
        string $name = '',
        string $value = '',
        string $errors = '',
        string $type = 'text',
        string $ph = '',
        string $title = '',
        array $attributes = []
    ): string {
        $attrString = '';
        foreach ($attributes as $key => $val) {
            $attrString .= $key . '="' . htmlspecialchars($val, ENT_QUOTES) . '" ';
        }
        $errorClass = $errors ? 'is-invalid' : '';
        return '
            <div class="form-group">
                <label for="' . htmlspecialchars($name, ENT_QUOTES) . '">' . htmlspecialchars($title, ENT_QUOTES) . '</label>
                <input type="' . htmlspecialchars($type, ENT_QUOTES) . '" 
                       class="form-control ' . $errorClass . '" 
                       id="' . htmlspecialchars($name, ENT_QUOTES) . '" 
                       name="' . htmlspecialchars($name, ENT_QUOTES) . '" 
                       placeholder="' . htmlspecialchars($ph, ENT_QUOTES) . '" 
                       value="' . htmlspecialchars(old($name, $value), ENT_QUOTES) . '" 
                       ' . $attrString . '/>
                ' . ($errors ? '<small class="form-text text-danger">' . htmlspecialchars($errors, ENT_QUOTES) . '</small>' : '') . '
            </div>
        ';
    }
}

if (!function_exists('form_select')) {
    /**
     * Generate a dynamic HTML select element
     *
     * @param string $name Nama atribut `name` untuk elemen select
     * @param array $options Pilihan dalam bentuk array ['value' => 'label']
     * @param mixed $selected Nilai yang dipilih (opsional)
     * @param string $title Label untuk select element
     * @param string $errors Pesan error jika ada
     * @param array $attributes Atribut tambahan untuk elemen select (opsional)
     * @return string HTML select element
     */
    function form_select(
        string $name = '',
        array $options = [],
        string $selected = '',
        string $title = '',
        string $errors = '',
        array $attributes = []
    ): string {
        // Build additional attributes
        $attrString = '';
        foreach ($attributes as $key => $val) {
            $attrString .= $key . '="' . htmlspecialchars($val, ENT_QUOTES) . '" ';
        }

        // Add error class if an error exists
        $errorClass = $errors ? 'is-invalid' : '';

        // Start building the HTML
        $html = '
            <div class="form-group">
                <label for="' . htmlspecialchars($name, ENT_QUOTES) . '">' . htmlspecialchars($title, ENT_QUOTES) . '</label>
                <select 
                    class="form-control ' . $errorClass . '" 
                    id="' . htmlspecialchars($name, ENT_QUOTES) . '" 
                    name="' . htmlspecialchars($name, ENT_QUOTES) . '" 
                    ' . $attrString . '>
                    <option value="">Pilih ' . htmlspecialchars($title, ENT_QUOTES) . '</option>
        ';

        // Populate options
        foreach ($options as $value => $label) {
            $isSelected = ($value == $selected) ? 'selected' : '';
            $html .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '" ' . $isSelected . '>' . htmlspecialchars($label, ENT_QUOTES) . '</option>';
        }

        // Close the select tag
        $html .= '
                </select>
        ';

        // Add error message if exists
        if ($errors) {
            $html .= '<small class="form-text text-danger">' . htmlspecialchars($errors, ENT_QUOTES) . '</small>';
        }

        // Close the div
        $html .= '
            </div>
        ';

        return $html;
    }
}


if (!function_exists('form_text')) {
    /**
     * Custom Input Form
     *
     * @param string $name       Nama input
     * @param string $value      Nilai default input
     * @param string $errors     Pesan error jika ada
     * @param string $type       Tipe input (default: text)
     * @param string $ph         Placeholder untuk input
     * @param string $title      Label untuk input
     * @param array  $attributes Atribut tambahan untuk input
     * @return string
     */
    function form_text(
        string $name = '',
        string $value = '',
        string $errors = '',
        // string $type = 'text',
        string $ph = '',
        string $title = '',
        array $attributes = []
    ): string {
        // Menyusun atribut tambahan
        $attrString = '';
        foreach ($attributes as $key => $val) {
            $attrString .= $key . '="' . htmlspecialchars($val, ENT_QUOTES) . '" ';
        }

        // Menentukan kelas error
        $errorClass = $errors ? 'is-invalid' : '';
        return '
            <div class="form-group">
                <label for="' . htmlspecialchars($name, ENT_QUOTES) . '">' . htmlspecialchars($title, ENT_QUOTES) . '</label>
                <textarea rows="5" 
                       class="form-control ' . $errorClass . '" 
                       id="' . htmlspecialchars($name, ENT_QUOTES) . '" 
                       name="' . htmlspecialchars($name, ENT_QUOTES) . '" 
                       placeholder="' . htmlspecialchars($ph, ENT_QUOTES) . '" 
                       value="' . htmlspecialchars(old($name, $value), ENT_QUOTES) . '" 
                       ' . $attrString . '>' . $value . ' </textarea>
                ' . ($errors ? '<small class="form-text text-danger">' . htmlspecialchars($errors, ENT_QUOTES) . '</small>' : '') . '
            </div>
        ';
    }
}
