<?php
if (!function_exists('btn_delete')) {
    function btn_delete(
        string $action = '',
        // string $title = '',
        string $categoryName = ''
    ): string {
        $attributesStr = '';

        return '
        <form action="' . $action . '" method="post" class="d-inline">
            ' . csrf_field() . '
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="dropdown-item text-danger" onclick="deleteConfirmed(this, \'' . $categoryName . '\')">
                Hapus
            </button>
        </form>
        <script>
            function deleteConfirmed(button, categoryName) {
                swal({
                    title: "Apakah Anda yakin?",
                    text: "Data " + categoryName + " akan dihapus secara permanen.",
                    icon: "warning",
                    buttons: ["Batal", "Hapus"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        button.closest("form").submit();
                    }
                });
            }
        </script>';
    }
}
