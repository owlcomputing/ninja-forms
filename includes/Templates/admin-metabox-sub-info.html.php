<div id="minor-publishing">

    <ul class="nf-sub-stats">

        <li class="nf-sub-info-seq">
            #: <strong>0</strong>
        </li>
        <li class="nf-sub-info-status">
            Status: <strong>Submitted</strong>
        </li>
        <li class="nf-sub-info-form">
            Form: <strong>Example Form</strong>
        </li>

        <li class="nf-sub-info-created">Submitted on: <strong><?php echo date( 'm/d/Y H:i' ); ?></strong></li>
        <li class="nf-sub-info-updated">Updated on: <strong><?php echo date( 'm/d/Y H:i' ); ?></strong></li>

        <li class="nf-sub-info-user">Submitted by: <strong>Kyle Johnson</strong></li>

    </ul>

</div>

<div id="major-publishing-actions" class="nf-sub-actions">
    <input name="save" type="submit" class="button button-primary button-large nf-sub-actions-save" id="publish" accesskey="p" value="<?php _e( 'Update', 'ninja-forms' ); ?>">
    <span class="spinner"></span>
</div>

<style>
    .nf-sub-stats li {
        padding: 5px 10px 5px;
    }

    .nf-sub-info-seq:before,
    .nf-sub-info-form:before,
    .nf-sub-info-status:before,
    .nf-sub-info-created:before,
    .nf-sub-info-updated:before,
    .nf-sub-info-user:before {
        color: #82878c;
        font: 400 1.4em dashicons;
        vertical-align: top;
        padding-right: 5px;
    }

    .nf-sub-info-seq:before,
    .nf-sub-info-form:before,
    .nf-sub-info-status:before {
        /* Dashicon: Post Screen - Status */
        content: "\f173";
    }

    .nf-sub-info-created:before,
    .nf-sub-info-updated:before {
        /* Dashicon: Post Screen - Calendar */
        content: "\f145";
    }

    .nf-sub-info-user:before {
        /* Dashicon: Admin Menu - Users */
        content: "\f110";
    }

    .nf-sub-actions {
        margin: 10px -12px -12px;
    }

    .nf-sub-actions:after {
        content: "";
        display: table;
        clear: both;
    }

    .nf-sub-actions .nf-sub-actions-save {
        text-align: right;
        float: right;
    }
</style>