<script>
function newPost() {
    window.location.href = site_url + 'backend/post/create_post'
}
$(function() {
    //search
    $(".search-query").on("keypress", function(e) {
        var sval = $(this).val();
        if (e.which == 13) {
            if (sval) {
                window.location.href = site_url + 'backend/post?q=' + sval;
            }
        }
    });

    var selected_data = [];
    //on chekbox checked
    $(".post-checkbox").change(function() {
        var rowid = $(this).attr('data-row-id');
        if ($(this).is(':checked')) {
            var post_row = $(".post-row-" + rowid).data('art');
            //push data
            selected_data.push(post_row);
            //add array index to current checked
            $(this).attr('temp-index', (selected_data.length-1));
            //fill the temp in dialog
            $("#post-id").val(post_row.article_id);
            $(".post-title").text(post_row.title);
            //store attribute on btn edit
            $(".btn-edit").attr("data-post_id", post_row.article_id);
        } else {
            //remove Array element of current Index
            $(this).removeAttr('temp-index');
            selected_data.splice($(this).attr('temp-index'), 1);
            //remove attribute on btn edit
            $(".btn-edit").removeAttr("data-post_id");
        }
        //disable/enable btns
        if (selected_data.length) {
            $('.btn-edit, .btn-publish, .btn-unpublish').removeAttr('disabled');
        } else {
            $('.btn-edit, .btn-publish, .btn-unpublish').attr('disabled', 'disabled');
        }
    });

    //dialog
    var publish_dialog = document.querySelector('.publish-dialog');
    if (! publish_dialog.showModal) {
      dialogPolyfill.registerDialog(publish_dialog);
    }
    var unpublish_dialog = document.querySelector('.unpublish-dialog');
    if (! unpublish_dialog.showModal) {
      dialogPolyfill.registerDialog(unpublish_dialog);
    }


    $(".btn-edit").click(function() {
        var article_id = $(this).data('post_id');
        window.location.href = site_url + 'backend/post/edit/' + article_id;
    });

    //publish
    $('.btn-publish').click(function() {
        publish_dialog.showModal();
    });
    $(".publish-post").click(function() {
        var article_id = $("#post-id").val();
        $.post(site_url + 'backend/post/publish', {article_id :article_id}, function(r) {
            if (r.status) {
                window.location.reload();
            } else {
                alert("try again");
            }
        }, 'json');
    });

    //closing dialogs
    $(".publish-close").click(function() {
        publish_dialog.close();
        $(".post-checkbox").each(function() {
            $(this).attr("checked", false);
        });
    });

    //unpublish
    $('.btn-unpublish').click(function() {
        unpublish_dialog.showModal();

    });

    $(".unpublish-close").click(function() {
        unpublish_dialog.close();
    });

    $(".unpublish-post").click(function() {
        var article_id = $("#post-id").val();
        $.post(site_url + 'backend/post/unPublish', {article_id :article_id}, function(r) {
            if (r.status) {
                window.location.reload();
            } else {
                alert("try again");
            }
        }, 'json');
    });

});
</script>
