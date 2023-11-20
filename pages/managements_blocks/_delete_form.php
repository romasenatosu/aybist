<form class="delete-form" method="post" action="<?= "?locale=$locale&page=$page&action=delete&id=$data_id" ?>">
    <!-- <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ file.id) }}"> -->
    <a href="javascript:void(0)" type="button"><i class="ti ti-trash" title="<?= $lang['text_delete'] ?>" data-bs-toggle="tooltip"></i></a>
</form>