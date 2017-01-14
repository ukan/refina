 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title></title>
<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css">
<style type="text/css">
/**
 * SimpleApp
 * http://notification-emails.com/
 * Last Modified: 10/05/2016
**/
/* Reset */

body { Margin: 0; padding: 0; min-width: 100%; }
a, #outlook a { display: inline-block; }
a, a span { text-decoration: none; }
img { line-height: 1; outline: none; border: 0; text-decoration: none; -ms-interpolation-mode: bicubic; mso-line-height-rule: exactly; }
table { border-spacing: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
td { padding: 0; }
/* Email preview text */
.email_summary { display:none; font-size:1px; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; }
/* Typography */
.font_default, h1, h2, h3, h4, h5, h6, p, a { font-family: Helvetica, Arial, sans-serif; /* this is used for email clients that don't support webfonts */ }
small { font-size: 86%; font-weight: normal; }
.pricing_box_cell small { font-size: 74%; }
.font_default, p { font-size: 15px; /* default text size */ }
p { line-height: 23px; Margin-top: 16px; Margin-bottom: 24px; }
.lead { font-size: 19px; line-height: 27px; Margin-bottom: 16px; }
.header_cell .column_cell { font-size: 20px; font-weight: bold; }
.header_cell p { margin-bottom: 0; }
h1, h2, h3, h4, h5, h6 { Margin-left: 0; Margin-right: 0; Margin-top: 16px; Margin-bottom: 8px; padding: 0; }
.line-through { text-decoration: line-through; }
h1,
h2 {
	font-size: 26px;
	line-height: 36px;
	font-weight: bold;
}
.pricing_box h1,
.pricing_box h2,
.primary_pricing_box h1,
.primary_pricing_box h2 {
	line-height: 20px;
	Margin-top: 16px;
	Margin-bottom: 0;
}
h3,
h4 {
	font-size: 22px;
	line-height: 30px;
	font-weight: bold;
}
h5 {
	font-size: 18px;
	line-height: 26px;
	font-weight: bold;
}
h6 {
	font-size: 16px;
	line-height: 24px;
	font-weight: bold;
}
.primary_btn td,
.secondary_btn td {
	font-size: 16px;
	mso-line-height-rule: exactly;
}
.primary_btn a,
.secondary_btn a {
	font-weight: bold;
}
/* Grid */
.email_body {
	text-align: center;
}
.email_container, .row, .col-1, .col-13, .col-2, .col-3 {
	display: inline-block;
	width: 100%;
	vertical-align: top;
	text-align: center;
}
.email_container {
	width: 100%;
	margin: 0 auto;
}
.row,
.col-3 { 
	max-width: 580px; 
}
.col-1 { max-width: 190px; }
.col-2 { max-width: 290px; }
.col-13 { max-width: 390px; }

.row { margin: 0 auto; }
.column {
	width: 100%;
	vertical-align: top;
}
.column_cell {
	padding: 16px;
	text-align: center;
	vertical-align: top;
}
.col-bottom-0 .column_cell { padding-bottom: 0; }
.col-top-0 .column_cell { padding-top: 0; }
/* Content Blocks */
.email_container, 
.header_cell, 
.jumbotron_cell, 
.content_cell, 
.footer_cell,
.image_responsive {
	font-size: 0 !important;
	text-align: center;
}
/* Header & Footer */
.header_cell,
.footer_cell {
	padding-bottom: 16px;
}
.header_cell .column_cell,
.footer_cell .col-13 .column_cell,
.footer_cell .col-1 .column_cell {
	text-align: left;
	padding-top: 16px;
}
.header_cell img {
	max-width: 156px;
	height: auto;
}
.footer_cell {
	border-top: 1px solid;
	text-align: center;
}
.footer_cell p { Margin: 16px 0; }
/* Jumbotron */
.invoice_cell .column_cell {
	text-align: left;
	padding-top: 0;
	padding-bottom: 0;
}
.invoice_cell p {
	margin-top: 8px;
	margin-bottom: 16px;
}
/* Content */
.pricing_box {
	border-collapse: separate;
	padding: 10px 16px;
	
	
}
.primary_pricing_box {
	border-collapse: separate;
	padding: 18px 16px;
}
.text_quote .column_cell {
	border-left: 4px solid;
	text-align: left;
	padding-right: 0;
	padding-top: 0;
	padding-bottom: 0;
}
/* Buttons */
.primary_btn,
.secondary_btn {
	clear: both;
	margin: 0 auto;
}
.primary_btn td,
.secondary_btn td {
	text-align: center;
	vertical-align: middle;
	padding: 12px 24px;
	
	
}
.primary_btn a,
.primary_btn span,
.secondary_btn a,
.secondary_btn span {
	text-align: center;
	display: block;
}
.label .font_default {
	font-size: 10px;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 2px;
	padding: 3px 7px;
	white-space: nowrap;
}
/* Icon Holder + Rules */
.icon_holder, .hruler {
	width: 62px;
	margin-left: auto;
	margin-right: auto;
	clear: both;
}
.icon_holder { width: 48px; }
.hspace, .hruler_cell {
	font-size: 0;
	height: 8px;
	overflow: hidden;
}
.hruler_cell {
	height: 4px;
	line-height: 4px;
}
.icon_cell {  font-size: 0;
  line-height: 1;
  padding: 8px;
  height: 48px;
}
/* Product Row */
.product_row { padding: 0 0 16px; }
.product_row .column_cell { padding: 16px 16px 0; }
.image_thumb img {
	
	
}
.product_row .col-13 .column_cell { text-align: left; }
.product_row h6 { Margin-top: 0; }
.product_row p {
	Margin-top: 8px;
	Margin-bottom: 8px;
}
.order_total_right .column_cell { text-align: right; }
.order_total_left .column_cell { text-align: left; }
.order_total p { Margin: 8px 0; }
.order_total h2 { Margin: 8px 0; }
/* Responsive Images */
.image_responsive img {
	display: block;
	width: 100%;
	height: auto;
	max-width: 580px;
	margin-left: auto;
	margin-right: auto;
}
/* Colors */
.content_cell {
	background-color: #ffffff; 
}
.header_cell,
.secondary_btn td,
.icon_primary .icon_cell,
.primary_pricing_box {
	background-color: #2f68b4;
}
body,
.email_body,
.jumbotron_cell,
.footer_cell,
.pricing_box {
	background-color: #f2f2f5;
}
.primary_btn td,
.label .font_default {
	background-color: #22aaa0;
}
.icon_secondary .icon_cell {
	background-color: #e1e3e7;
}
.label_1 .font_default {
	background-color: #62a9dd;
}
.label_2 .font_default {
	background-color: #8965ad;
}
.label_3 .font_default {
	background-color: #df6164;
}
.header_cell .column_cell,
.header_cell a,
.header_cell a span,
.primary_btn a,
.primary_btn span,
.secondary_btn a,
.secondary_btn span,
.label .font_default,
.primary_pricing_box,
.primary_pricing_box h1,
.primary_pricing_box small {
	color: #ffffff;
}
h2,
h4,
h5,
h6 {
	color: #383d42;
}
.column_cell {
	color: #888888;
}
h1,
h3,
a,
a span,
.text-secondary,
.column_cell .text-secondary, 
.content_cell h2 .text-secondary {
	color: #2f68b4;
}
.footer_cell a, 
.footer_cell a span {
	color: #7a7a7a;
}
.text-muted,
.footer_cell .column_cell, 
.content h4 span, 
.content h3 span {
	color: #b3b3b5;
}
.footer_cell,
.product_row, 
.order_total {
	border-top: 1px solid;
}
.product_row, 
.order_total,
.icon_secondary .icon_cell, 
.footer_cell, 
.content .product_row, 
.content .order_total,
.pricing_box,
.text_quote .column_cell {
	border-color: #d8dde4;
}
/* Responsive */
@media screen {
  h1, h2, h3, h4, h5, h6, p, a, .font_default {
	  font-family: "Noto Sans", Helvetica, Arial, sans-serif !important;  /* web font */
  }
  .primary_btn td, .secondary_btn td {
	  padding: 0 !important;
  }
  .primary_btn a, .secondary_btn a {
	  padding: 12px 24px !important;
  }
}
@media screen and (min-width: 631px) and (max-width: 769px) {
.col-1, .col-2, .col-3, .col-13 {
	float: left !important;
}
.col-1 {
	width: 200px !important;
}
.col-2 {
	width: 300px !important;
}
}
@media screen and (max-width: 630px) {
  .jumbotron_cell {
	  background-size: cover !important;
  }
  .row, .col-1, .col-13, .col-2, .col-3 {
	  max-width: 100% !important;
  }
}
</style>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="margin: 0;padding: 0;min-width: 100%;background-color: #f2f2f5;">
<div class="email_body" style="-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;border: 2px solid #9f9999;text-align: center;background-color: #f2f2f5;">
    <div class="email_container" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;margin: 0 auto;font-size: 0 !important;">
      <table class="jumbotron" width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
        <tbody>
          <tr>
            <td class="header_cell col-bottom-0" align="center" valign="top" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; padding: 0;text-align: center;padding-bottom: 16px;background-color: #2f68b4;font-size: 0 !important;">
                <!--[if (gte mso 9)|(IE)]>
                <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                  <tbody>
                    <tr>
                      <td width="580" align="center" valign="top">
                <![endif]-->
                <div class="row" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 580px;margin: 0 auto;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                    <tbody>
                      <tr>
                        <td width="580" align="center" valign="top">
                  <![endif]-->
                  <div class="col-3" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 580px;">
                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;vertical-align: top;">
                      <tbody>
                        <tr>
                          <td class="column_cell font_default" align="center" valign="top" style="padding: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 20px;text-align: left;vertical-align: top;color: #ffffff;font-weight: bold;padding-bottom: 0;padding-top: 16px;"><a href="#" style="display: inline-block;text-decoration: none;font-family: Helvetica, Arial, sans-serif;color: #ffffff;"><img src="{{ asset('assets/general/images/identity/favicon.png') }}"  alt="Scoido" style="line-height: 1;outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;mso-line-height-rule: exactly;max-width: 156px;height: auto;"></a> Scoido</td><!-- /.column_cell -->
                        </tr>
                      </tbody>
                    </table><!-- /.column -->
                  </div><!-- /.col-3 -->
                  <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <![endif]-->
                </div><!-- /.row -->
                <!--[if (gte mso 9)|(IE)]>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <![endif]-->
            </td><!-- /.header_cell -->
          </tr>
        </tbody>
      </table><!-- /.header -->
      <table class="jumbotron" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
        <tbody>
          <tr>
            <td class="jumbotron_cell" align="center" valign="top" style="padding: 0;text-align: center;background-color: #f2f2f5;font-size: 0 !important;">
                <!--[if (gte mso 9)|(IE)]>
                <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                  <tbody>
                    <tr>
                      <td width="580" align="center" valign="top">
                <![endif]-->
                <div class="row" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 580px;margin: 0 auto;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                    <tbody>
                      <tr>
                        <td width="580" align="center" valign="top">
                  <![endif]-->
                  <div class="col-3" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 580px;">
                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;vertical-align: top;">
                      <tbody>
                        <tr>
                          <td class="column_cell font_default" align="center" valign="top" style="padding: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 15px;text-align: center;vertical-align: top;color: #888888;">
                           <table class="icon_holder icon_primary" width="80" border="0" align="center" cellpadding="0" cellspacing="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 48px;margin-left: auto;margin-right: auto;clear: both;">
                              <tbody>
                                <tr>
                                  <td class="hspace" style="padding: 0;font-size: 0;height: 2px;overflow: hidden;">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td class="icon_cell" style="padding: 8px;font-size: 0;line-height: 1;height: 48px;background-color: #2f68b4;"><img src="{{ asset('assets/frontend/images/ic_vpn_key_white_48dp_2x.png') }}" width="48" height="48" alt="" style="line-height: 1;outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;mso-line-height-rule: exactly;"></td>
                                </tr>
                                <tr>
                                  <td class="hspace" style="padding: 0;font-size: 0;height: 8px;overflow: hidden;">&nbsp;</td>
                                </tr>
                              </tbody>
                            </table><!-- /.icon_holder:icon_primary -->
                            <h3 style="font-family: Helvetica, Arial, sans-serif;margin-left: 0;margin-right: 0;margin-top: 16px;margin-bottom: 8px;padding: 0;font-size: 22px;line-height: 3px;font-weight: bold;color: #2f68b4;">Email Activation</h3>
                          </td><!-- /.column_cell -->
                        </tr>
                      </tbody>
                    </table><!-- /.column -->
                  </div><!-- /.col-3 -->
                  <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <![endif]-->
                </div><!-- /.row -->
                <!--[if (gte mso 9)|(IE)]>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <![endif]-->
            </td><!-- /.jumbotron_cell -->
          </tr>
        </tbody>
      </table><!-- /.jumbotron -->
      <table class="content" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
        <tbody>
          <tr>
            <td class="content_cell" align="center" valign="top" style="padding: 0;text-align: center;background-color: #ffffff;font-size: 0 !important;">
                <!--[if (gte mso 9)|(IE)]>
                <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                  <tbody>
                    <tr>
                      <td width="580" align="center" valign="top">
                <![endif]-->
                <div class="row" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 580px;margin: 0 auto;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                    <tbody>
                      <tr>
                        <td width="580" align="center" valign="top">
                  <![endif]-->
                  <div class="col-3" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 580px;">
                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;vertical-align: top;">
                      <tbody>
                        <tr>
                          <td class="column_cell font_default" align="center" valign="top" style="padding: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 15px;text-align: center;vertical-align: top;color: #888888;">
 
              	<p style="font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 23px;margin-top: 16px;margin-bottom: 24px;">Hai {!! $first_name !!}, <br>
				<b>Someone has request for Activation, if don't disobey this email.</b></p>

				<p>To activate your account please follow this link : {!! link_to('process-activation/'.$code, 'Activate') !!}.</p>

                            <!-- <div class="">
                            @if (Session::has('error'))
                              <div class="alert alert-danger">{!! Session::get('error') !!}</div>
                            @endif

                              <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                <button type="submit" style="padding: 12px 24px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;text-align: center;vertical-align: middle;background-color: #2f68b4;" ><b><span style="text-decoration: none;color: #ffffff;text-align: center;display: block;">Reset Password</span></b></button>
                                  
                                </div>
                                <div class="clear"></div>
                              </div>
                            </div> -->
                            <table class="secondary_btn" align="center" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;clear: both;margin: 0 auto;">
                              <tbody>
                                
                              </tbody>
                            </table><!-- end .secondary_btn -->
                            <!-- <p style="font-family: Helvetica, Arial, sans-serif;font-size: 15px;line-height: 23px;margin-top: 16px;margin-bottom: 24px;"><small style="font-size: 86%;font-weight: normal;">If you didn't request a password reset, please ignore this email.</small></p> -->
                          </td><!-- /.column_cell -->
                        </tr>
                      </tbody>
                    </table><!-- /.column -->
                  </div><!-- /.col-3 -->
                  <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <![endif]-->
                </div><!-- /.row -->
                <!--[if (gte mso 9)|(IE)]>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <![endif]-->
            </td><!-- /.content_cell -->
          </tr>
        </tbody>
      </table><!-- /.content -->
      <table class="footer" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
        <tbody>
          <tr>
            <td class="footer_cell" align="center" valign="top" style="padding: 0;text-align: center;padding-bottom: 16px;border-top: 1px solid;background-color: #f2f2f5;border-color: #d8dde4;font-size: 0 !important;">
                <!--[if (gte mso 9)|(IE)]>
                <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                  <tbody>
                    <tr>
                      <td width="580" align="center" valign="top">
                <![endif]-->
                <div class="row" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 580px;margin: 0 auto;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table width="580" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
                    <tbody>
                      <tr>
                        <td width="390" align="center" valign="top">
                  <![endif]-->
                  <div class="col-13 col-bottom-0" style="display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 390px;">
                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;vertical-align: top;">
                      <tbody>
                        <tr>
                          <td class="column_cell font_default" align="center" valign="top" style="padding: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 15px;text-align: left;vertical-align: top;color: #b3b3b5;padding-bottom: 0;padding-top: 16px;">
                          <small style="font-size: 86%;font-weight: normal;">this email was sent by <a href="#" style="display: inline-block;text-decoration: none;font-family: Helvetica, Arial, sans-serif;color: #7a7a7a;">noreply@scoido.com</a>, please do not reply to this email. <br>
                          Copyright © 2016  scoido All rights reserved..</small></td><!-- /.column_cell -->
                        </tr>
                      </tbody>
                    </table><!-- /.column -->
                  </div><!-- /.col-13 -->
                  <!--[if (gte mso 9)|(IE)]>
                      </td>
                      <td width="190" align="center" valign="top">
                  <![endif]-->
                  <div class="col-1 col-bottom-0" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;display: inline-block;width: 100%;vertical-align: top;text-align: center;max-width: 190px;">
                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;vertical-align: top;">
                      <tbody>
                        <tr>
                          <td class="column_cell font_default" align="center" valign="top" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;padding: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 15px;text-align: left;vertical-align: top;color: #b3b3b5;padding-bottom: 0;padding-top: 16px;">
                            <!-- <a href="#" style="display: inline-block;text-decoration: none;font-family: Helvetica, Arial, sans-serif;color: #7a7a7a;">&nbsp;<img src="{{ asset('assets/frontend/images/ic_facebook.png') }}" width="24" height="24" alt="" style="line-height: 1;outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;mso-line-height-rule: exactly;">&nbsp;</a> &nbsp;<a href="#" style="display: inline-block;text-decoration: none;font-family: Helvetica, Arial, sans-serif;color: #7a7a7a;">&nbsp;<img src="{{ asset('assets/frontend/images/ic_twitter.png') }}" width="24" height="24" alt="" style="line-height: 1;outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;mso-line-height-rule: exactly;">&nbsp;</a> &nbsp;<a href="#" style="display: inline-block;text-decoration: none;font-family: Helvetica, Arial, sans-serif;color: #7a7a7a;">&nbsp;<img src="{{ asset('assets/frontend/images/ic_pinterest.png') }}" width="24" height="24" alt="" style="line-height: 1;outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;mso-line-height-rule: exactly;">&nbsp;</a> &nbsp;<a href="#" style="display: inline-block;text-decoration: none;font-family: Helvetica, Arial, sans-serif;color: #7a7a7a;">&nbsp;<img src="{{ asset('assets/frontend/images/ic_youtube.png') }}" width="24" height="24" alt="" style="line-height: 1;outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;mso-line-height-rule: exactly;">&nbsp;</a> -->
                          </td><!-- /.column_cell -->
                        </tr>
                      </tbody>
                    </table><!-- /.column -->
                  </div><!-- /.col-1 -->
                  <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <![endif]-->
                </div><!-- /.row -->
                <!--[if (gte mso 9)|(IE)]>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <![endif]-->
            </td><!-- /.footer_cell -->
          </tr>
        </tbody>
      </table><!-- /.footer -->
    </div><!-- /.email_container -->
</div><!-- /.email_body -->
</body>
</html> 