@import url("https://use.typekit.net/ksc4joc.css"); *
{
    border: 0 none;
    outline: 0;
    padding: 0;
    margin: 0;
    box - sizing: border - box; -
    webkit - appearance: value; -
    moz - appearance: value;
    appearance: value;
    word - break: break -word;
}

html,
body,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
font,
img,
ins,
kbd,
q,
s,
samp,
small,
span,
strike,
strong,
sub,
sup,
tt,
var,
b,
u,
i,
center,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
fieldset {
    margin: 0 px;
    padding: 0 px;
    border: 0;
    outline: 0;
    font - size: 100 % ;
}

a,
img a {
    text - decoration: none;
    border: 0;
    outline: 0!important;
    transition: all ease - in .3 s; -
    moz - transition: all ease - in .3 s; -
    ms - transition: all ease - in .3 s; -
    o - transition: all ease - in .3 s; -
    webkit - transition: all ease - in .3 s;
}

figure {
    margin: 0;
    padding: 0;
}

a,
button,
input {
    transition: all ease - in .3 s; -
    moz - transition: all ease - in .3 s; -
    ms - transition: all ease - in .3 s; -
    o - transition: all ease - in .3 s; -
    webkit - transition: all ease - in .3 s;
}

: focus {
    outline: 0 px;
}

table {
    border - collapse: collapse;
    border - spacing: 0 px;
}

ol,
ul,
li {
    list - style - type: none;
    margin: 0 px;
    padding: 0 px;
}

img,
button {
    user - select: none; -
    webkit - user - drag: auto;
}

button {
    cursor: pointer;
}

a,
img {
    -webkit - tap - highlight - color: transparent; -
    moz - tap - highlight - color: transparent;
}

input,
textarea,
button,
select,
a {
    -webkit - tap - highlight - color: rgba(0, 0, 0, 0);
}

a: hover,
    a: active,
    a: focus {
        text - decoration: none!important;
    }

.clear {
    clear: both;
}

.clearfix: after {
    clear: both;
}

.clearfix: before,
    .clearfix: after {
        content: " ";
        display: table;
    }

.full - height,
    body,
    html {
        height: 100 % ;
    }

input::-webkit - outer - spin - button,
    input::-webkit - inner - spin - button {
        -webkit - appearance: none;
        margin: 0;
    }


/* Firefox */

input[type = number] {
    -moz - appearance: textfield;
}

a {
    cursor: pointer;
}

img {
    user - select: none; -
    webkit - user - drag: none;
}

.pointer {
    cursor: pointer;
}

section {
    width: 100 % ;
    position: relative;
}

.text - right {
    text - align: right;
}

.text - center {
    text - align: center;
}

.text - left {
    text - align: left;
}

.vertical_mid {
    align - items: center;
}

.desktop_hide {
    display: none!important;
}

@media(min - width: 577 px) {
    .billing_radio_btn_up {
        display: none;
    }
}

@media(max - width: 576 px) {
    .billing_radio_btn_down {
        display: none;
    }
}

@media(max - width: 766 px) {
    .mob_reverse {
        flex - flow: column - reverse!important;
    }
    .mob_hide {
        display: none!important;
    }
    .desktop_hide {
        display: block!important;
    }
}

.m_r_20 {
    margin - right: 20 px;
}

.align_center {
    align - items: center;
}

.h_center {
    justify - content: center;
}

.m_t_50 {
    margin - top: 50 px!important;
}

.sm_12 {
    max - width: 387 px;
    margin: 0 auto;
    font - size: 16 px!important;
}

.custom_container {
    max - width: 73.125 rem;
    padding - left: 15 px;
    padding - right: 15 px;
    margin: 0 auto;
}

.flex_row {
    display: flex;
    margin: 0 - 10 px;
    flex - flow: wrap;
}

[class ^= "flex_col_"] {
    padding: 0 10 px;
}

.flex_col_sm_12 {
    width: 100 % ;
}

.flex_col_sm_6 {
    width: 50 % ;
}

@media(max - width: 766 px) {
    .flex_col_sm_6 {
        width: 100 % ;
    }
}

.flex_col_sm_2 {
    width: 20 % ;
}

.flex_col_sm_8 {
    width: 66.3 % ;
}

.flex_col_sm_10 {
    width: 80 % ;
}

.flex_col_sm_4 {
    width: 33.3 % ;
}

@media(max - width: 766 px) {
    .flex_col_sm_4 {
        width: 100 % ;
    }
}

.flex_col_sm_3 {
    width: 25 % ;
}

@media(max - width: 766 px) {
    .flex_col_sm_3 {
        width: 100 % ;
    }
}


/*--------------------btn effect--------------------------*/

.btn_effect {
    position: relative;
    overflow: hidden;
}

.btn_effect: before,
    .btn_effect: after {
        width: 0 % ;
        content: "";
        background: #ffffff30;
        height: 100 % ;
        position: absolute;
        top: 0;
        opacity: 0; -
        webkit - transition: all 600 ms cubic - bezier(0.215, 0.61, 0.355, 1);
        transition: all 600 ms cubic - bezier(0.215, 0.61, 0.355, 1);
    }

.btn_effect: before {
    right: 50 % ;
}

.btn_effect: after {
    left: 50 % ;
}

.btn_effect: hover: before,
    .btn_effect: hover: after {
        width: 50 % ;
        opacity: 1;
    }


/*--------------------btn effect close--------------------------*/

.link {
    position: relative;
}

.link: after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 1 px;
        background: #000;
    -webkit-transition: all ease .4s;
    transition: all ease .4s;
}

.link:hover:after {
    width: 100%;
}

footer {
    font-size: 14px;
    text-align: center;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 22px 0;
}

.form_field {
    margin-bottom: 15px;
}

.text-field {
    position: relative;
}

input[type= "text"],
    input[type = "email"],
    textarea,
    select {
        background: transparent;
        padding: 12 px 4 px;
        font - size: 14 px;
        border - radius: 0;
        width: 100 % ; -
        webkit - appearance: none;
        border - bottom: 1 px solid #000;
}

textarea {
    height: 140px;
    resize: none;
}

input::placeholder {
    color: # 000;
    }

button {
    outline: 0!important;
}

@font - face {
    font - family: europaLight;
    src: url(/fonts/Europa - Light.ttf);
}

html {
    scroll - behavior: smooth;
}

body {
    font - family: europaLight;
    font - weight: 400;
    font - style: normal;
    scroll - behavior: smooth;
}

.app_wrapper {
    position: relative;
    min - height: 100 % ;
    max - width: 1440 px;
    margin: 0 auto;
    padding: 0 0 65 px 0;
}

.app_wrapper.waterbg {
    background - image: url("../images/bg_img.jpg");
    background - repeat: no - repeat;
    background - position: center;
}

.welcome_wrapper {
    position: absolute;
    top: 50 % ;
    left: 50 % ;
    transform: translate(-50 % , -50 % );
    width: 100 % ;
}

.welcome_wrapper a {
    color: #000;
    display: inline-block;
    margin: 20px 0 0 0;
}

.welcome_wrapper .welcome_note {
    font-size: 32px;
    font-weight: 300;
    margin-bottom: 20px;
}

.welcome_wrapper h1 {
    font-size: 42px;
    margin: 30px 0 0;
    font-weight: 500;
}

.head_section {
    text-align: center;
    padding: 46px 0;
    text-transform: uppercase;
}

.head_section .brand {
    display: flex;
    align-items: center;
    justify-content: center;
}

.head_section .brand .brand_txt {
    font-size: 55px;
    margin-left: 10px;
}

.tagline_wrap .tagline {
    width: 540px;
    margin: 0 auto;
    font-size: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 300;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.tagline_wrap p {
    font-size: 16px;
}

.form_wrapper {
    max-width: 600px;
    margin: 20px auto;
}

.form_wrapper.edit_form_wrapper {
    max-width: 450px;
    margin: 0 auto;
}

.dots_wrapper {
    text-align: center;
    margin: 50px 0 20px;
}

.dots_wrapper ul {
    display: flex;
    align-items: center;
    justify-content: center;
}

.dots_wrapper ul li {
    width: 8px;
    height: 8px;
    margin: 0 2px;
    border-radius: 50%;
    border: 1px solid # 0000003 b;
}

.dots_wrapper ul li.active {
    background - color: #000;
}

.primary_btn {
    padding: 8px;
    font-size: 14px;
    color: # df5509;
    background: #000;
    border-radius: 25px;
    width: 120px;
}

.outline_btn {
    padding: 8px;
    font-size: 14px;
    background-color: # fff;
    color: #000;
    border: 1px solid # 000;
    border - radius: 25 px;
    width: 120 px;
}

.outline_btn: hover {
    background - color: #000;
    color: # fff;
}

.custom_select.bootstrap - select: not([class *= col - ]): not([class *= form - control]): not(.input - group - btn) {
    width: 100 % !important;
}

.bootstrap - select: not([class *= col - ]): not([class *= form - control]): not(.input - group - btn) {
    width: 100 % !important;
}

.bootstrap - select.dropdown - toggle: focus {
    outline: none!important;
}

.custom_select.btn - light {
    color: #212529 !important;
    background-color: transparent !important;
    border-color: # 000;
    border: none;
    border - radius: 0;
}

.custom_select.btn - light: hover {
    background - color: transparent!important;
    border - color: #000;
    box-shadow: none !important;
    outline: none !important;
}

.custom_select .bootstrap-select .dropdown-toggle:focus,
.bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
    background: transparent !important;
    outline: none !important;
    box-shadow: none !important;
}

.bootstrap-select .dropdown-menu.inner {
    background: # 000!important;
    color: #fff!important;
}

.dropdown - item.active,
    .dropdown - item: active {
        background - color: #000 !important;
    color: # fff!important;
    }

.dropdown - toggle::after {
    background - image: url("../images/line-angle-down.svg");
    width: 15 px;
    height: 15 px;
    background - repeat: no - repeat;
    border: none!important;
    background - position: center;
}

.dropup.dropdown - toggle::after {
    background - image: url("../images/line-angle-up.svg");
    width: 15 px;
    height: 15 px;
    background - repeat: no - repeat;
    border: none!important;
}

.dropdown - menu li a span.text {
    position: relative;
}

.dropdown - menu li a span.text: before {
    position: absolute;
    content: "";
    width: 12 px;
    height: 13 px;
    border - radius: 50 % ;
    border: 1 px solid# fff;
    left: -15 px;
    top: 50 % ;
    transform: translateY(-50 % );
}

.dropdown - item: focus,
    .dropdown - item: hover {
        background - color: #000 !important;
}

.dropdown-item:focus li a span.text:before,
.dropdown-item:hover li a span.text:before {
    background-color: # fff!important;
    }

.bootstrap - select.dropdown - menu li a: hover span.text: before {
    background - color: #fff!important;
}

.edit {
    position: absolute;
    right: 0;
    top: 50 % ;
    transform: translateY(-50 % );
    background: #000;
    color: # fff;
    padding: 2 px 15 px;
    border - radius: 25 px;
    font - size: 12 px;
    text - transform: uppercase;
}

.edit_form_wrapper.custom_select.btn - light {
    padding - left: 0;
    border - bottom: 1 px solid #000;
}

.text-note {
    display: block;
    font-size: 12px;
    font-weight: 500;
    margin-bottom: 5px;
}

.btn_black {
    color: # fff;
}

.form_label {
    font - size: 14 px;
    font - weight: 500;
    margin: 0!important;
}

.recipt_note {
    font - size: 20 px;
    margin: 25 px auto;
}

.show_label {
    font - size: 14 px;
    font - weight: 500;
    margin: 0;
}

.support_note {
    font - size: 17 px;
    text - align: center;
    line - height: 1.7;
}

.droplet_logowrap {
    margin: 45 px 0;
}

.droplet_logowrap span {
    display: block;
    font - size: 19 px;
    margin: 0 0 13 px;
}

.droplet_logowrap img {
    width: 210 px;
}


/*# sourceMappingURL=style.css.map */