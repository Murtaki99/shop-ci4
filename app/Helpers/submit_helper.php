<?php
if (!function_exists('btn_submit')) {
    function btn_submit(
        string $href = '#',
        array $attributes = []
    ): string {
        return '
        <div class="float-right">
            <a href="' . $href . '" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        ';
    }
}
