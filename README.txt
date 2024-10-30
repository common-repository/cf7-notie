=== CF7 Notie ===
Contributors: FabbricaWeb
Donate link: https://www.fabbricaweb.com.br
Tags: contact form 7, wpcf7,contact form 7 addon, contact form, notie
Requires at least: 3.1.0
Tested up to: 4.4
Stable tag: 1.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display Contact Form 7 response messages as an alternative the standard alert dialog.

== Description ==

This plugin adds the [Notie.js script](https://jaredreich.com/projects/notie.js/) into [Contact Form 7](https://wordpress.org/plugins/contact-form-7/) wordpress plugin submission process.

> This plugin requires the Contact Form 7 plugin to work.

Just activate it to replace CF7 default submission output by a Sweet Alert pop up.
The add-on will display the Contact Form 7 messages in the pop up.

If you want, you can set custom colors for the alerts.

== How does it work? ==

It enqueues scripts and styles to override CF7 submission process and surcharge it with Notie.js script.

== Installation ==

Go to your Wordpress Dashboard. From there select Plugins -> Add New. Search for \'CF7 Notie\', make sure it found the right plugin and click Install Now.

Alternatively, extract the zip file and upload the contents to the wp-content/plugins/ directory of your WordPress installation and then activate the plugin from the plugins page.

You can set a custom colors for the alerts in "CF7 Notie" panel in the admin.

== Changelog ==

* 1.0
First release.

* 1.1
Fixed bug with multiple forms on same page.