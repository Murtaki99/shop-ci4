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
