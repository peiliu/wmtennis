<?php
/**
 * Style options
 */
?>
<style>
    .hg-login-modal-container {
        background-color: #<?php echo HG_Login()->settings->popup_bg_color; ?>;
    }

    .hg-login-modal-header {
        background-color: #<?php echo HG_Login()->settings->popup_header_bg_color; ?>;
    }

    .hg-login-modal-header,
    .hg-login-modal-header h4,
    .hg-login-modal-header h3 {
        color: #<?php echo HG_Login()->settings->popup_header_text_color; ?>;
    }

    .view-flat.type-light {
        color: #<?php echo HG_Login()->settings->popup_close_btn_color; ?>;
    }

    .modal-auth--social-button .-facebook {
        color: #<?php echo HG_Login()->settings->popup_fb_btn_text_color; ?>;
        background-color: #<?php echo HG_Login()->settings->popup_fb_btn_bg_color; ?>;
    }

     .hg-login-modal-footer {
         background-color: #<?php echo HG_Login()->settings->popup_footer_bg_color; ?>;
     }

    .hg-login-modal-input input[type="color"],
    .hg-login-modal-input input[type="date"],
    .hg-login-modal-input input[type="datetime"],
    .hg-login-modal-input input[type="datetime-local"],
    .hg-login-modal-input input[type="email"],
    .hg-login-modal-input input[type="month"],
    .hg-login-modal-input input[type="number"],
    .hg-login-modal-input input[type="password"],
    .hg-login-modal-input input[type="search"],
    .hg-login-modal-input input[type="tel"],
    .hg-login-modal-input input[type="text"],
    .hg-login-modal-input input[type="time"],
    .hg-login-modal-input input[type="url"],
    .hg-login-modal-input input[type="week"],
    .hg-login-modal-input textarea {
        background-color: #<?php echo HG_Login()->settings->popup_input_bg_color; ?>;
        box-shadow:0 0 0 1000px #<?php echo HG_Login()->settings->popup_input_bg_color; ?> inset;
    }

    .hg-login-modal-input input:-webkit-autofill,
    .hg-login-modal-input textarea:-webkit-autofill,
    .hg-login-modal-input select:-webkit-autofill {
        background-color: #<?php echo HG_Login()->settings->popup_input_bg_color; ?>;
        box-shadow:0 0 0 1000px #<?php echo HG_Login()->settings->popup_input_bg_color; ?> inset;
    }

    .hg-login-modal-input input[type="color"]:focus,
    .hg-login-modal-input input[type="date"]:focus,
    .hg-login-modal-input input[type="datetime"]:focus,
    .hg-login-modal-input input[type="datetime-local"]:focus,
    .hg-login-modal-input input[type="email"]:focus,
    .hg-login-modal-input input[type="month"]:focus,
    .hg-login-modal-input input[type="number"]:focus,
    .hg-login-modal-input input[type="password"]:focus,
    .hg-login-modal-input input[type="search"]:focus,
    .hg-login-modal-input input[type="tel"]:focus,
    .hg-login-modal-input input[type="text"]:focus,
    .hg-login-modal-input input[type="time"]:focus,
    .hg-login-modal-input input[type="url"]:focus,
    .hg-login-modal-input input[type="week"]:focus,
    .hg-login-modal-input textarea:focus {
        box-shadow:0 0 0 1000px #<?php echo HG_Login()->settings->popup_input_bg_color; ?> inset;
    }


    .hg-login-modal-input input[type="color"] ~ label,
    .hg-login-modal-input input[type="date"] ~ label,
    .hg-login-modal-input input[type="datetime"] ~ label,
    .hg-login-modal-input input[type="datetime-local"] ~ label,
    .hg-login-modal-input input[type="email"] ~ label,
    .hg-login-modal-input input[type="month"] ~ label,
    .hg-login-modal-input input[type="number"] ~ label,
    .hg-login-modal-input input[type="password"] ~ label,
    .hg-login-modal-input input[type="search"] ~ label,
    .hg-login-modal-input input[type="tel"] ~ label,
    .hg-login-modal-input input[type="text"] ~ label,
    .hg-login-modal-input input[type="time"] ~ label,
    .hg-login-modal-input input[type="url"] ~ label,
    .hg-login-modal-input input[type="week"] ~ label,
    .hg-login-modal-input textarea ~ label {
        color: #<?php echo HG_Login()->settings->popup_input_label_color; ?>;
    }

    .hg-login-modal-input input[type="color"]:focus ~ label,
    .hg-login-modal-input input[type="color"]:valid ~ label,
    .hg-login-modal-input input[type="date"]:focus ~ label,
    .hg-login-modal-input input[type="date"]:valid ~ label,
    .hg-login-modal-input input[type="datetime"]:focus ~ label,
    .hg-login-modal-input input[type="datetime"]:valid ~ label,
    .hg-login-modal-input input[type="datetime-local"]:focus ~ label,
    .hg-login-modal-input input[type="datetime-local"]:valid ~ label,
    .hg-login-modal-input input[type="email"]:focus ~ label,
    .hg-login-modal-input input[type="email"]:valid ~ label,
    .hg-login-modal-input input[type="month"]:focus ~ label,
    .hg-login-modal-input input[type="month"]:valid ~ label,
    .hg-login-modal-input input[type="number"]:focus ~ label,
    .hg-login-modal-input input[type="number"]:valid ~ label,
    .hg-login-modal-input input[type="password"]:focus ~ label,
    .hg-login-modal-input input[type="password"]:valid ~ label,
    .hg-login-modal-input input[type="search"]:focus ~ label,
    .hg-login-modal-input input[type="search"]:valid ~ label,
    .hg-login-modal-input input[type="tel"]:focus ~ label,
    .hg-login-modal-input input[type="tel"]:valid ~ label,
    .hg-login-modal-input input[type="text"]:focus ~ label,
    .hg-login-modal-input input[type="text"]:valid ~ label,
    .hg-login-modal-input input[type="time"]:focus ~ label,
    .hg-login-modal-input input[type="time"]:valid ~ label,
    .hg-login-modal-input input[type="url"]:focus ~ label,
    .hg-login-modal-input input[type="url"]:valid ~ label,
    .hg-login-modal-input input[type="week"]:focus ~ label,
    .hg-login-modal-input input[type="week"]:valid ~ label,
    .hg-login-modal-input textarea:focus ~ label,
    .hg-login-modal-input textarea:valid ~ label {
        color: #<?php echo HG_Login()->settings->popup_input_focused_label_color; ?>;
    }

    .hg-login-modal-input input[type="color"] ~ label sup,
    .hg-login-modal-input input[type="date"].invalid ~ label sup,
    .hg-login-modal-input input[type="datetime"].invalid ~ label sup,
    .hg-login-modal-input input[type="datetime-local"].invalid ~ label sup,
    .hg-login-modal-input input[type="email"].invalid ~ label sup,
    .hg-login-modal-input input[type="month"].invalid ~ label sup,
    .hg-login-modal-input input[type="number"].invalid ~ label sup,
    .hg-login-modal-input input[type="password"].invalid ~ label sup,
    .hg-login-modal-input input[type="search"].invalid ~ label sup,
    .hg-login-modal-input input[type="tel"].invalid ~ label sup,
    .hg-login-modal-input input[type="text"].invalid ~ label sup,
    .hg-login-modal-input input[type="time"].invalid ~ label sup,
    .hg-login-modal-input input[type="url"].invalid ~ label sup,
    .hg-login-modal-input input[type="week"].invalid ~ label sup,
    .hg-login-modal-input input[type="checkbox"].invalid ~ label sup,
    .hg-login-modal-input textarea:focus ~ label {
        color: #<?php echo HG_Login()->settings->popup_input_error_color; ?>;
    }

    .-button.-view-flat.-type-primary {
        color: #<?php echo HG_Login()->settings->popup_primary_btn_color; ?>;
    }

    .-button.-view-flat.-type-primary:hover {
        color: #<?php echo HG_Login()->settings->popup_primary_btn_hover_color; ?>;
    }

    .-button.-view-flat {
        color: #<?php echo HG_Login()->settings->popup_secondary_btn_color; ?>;
    }

    .-button.-view-flat:hover {
        color: #<?php echo HG_Login()->settings->popup_secondary_btn_hover_color; ?>;
    }

    #hg_login_primary_button {
        background-color: #<?php echo HG_Login()->settings->login_btn_bg_color; ?>;
        color: #<?php echo HG_Login()->settings->login_btn_text_color; ?>;
        font-size: <?php echo HG_Login()->settings->login_btn_text_size; ?>px;
    }


    #hg_login_primary_button:hover {
        background-color: #<?php echo HG_Login()->settings->login_btn_hover_bg_color; ?>;
        color: #<?php echo HG_Login()->settings->login_btn_hover_text_color; ?>;
    }

    #hg_signup_primary_button {
        background-color: #<?php echo HG_Login()->settings->signup_btn_bg_color; ?>;
        color: #<?php echo HG_Login()->settings->signup_btn_text_color; ?>;
        font-size: <?php echo HG_Login()->settings->signup_btn_text_size; ?>px;
    }

    #hg_signup_primary_button:hover {
        background-color: #<?php echo HG_Login()->settings->signup_btn_hover_bg_color; ?>;
        color: #<?php echo HG_Login()->settings->signup_btn_hover_text_color; ?>;
    }
</style>

