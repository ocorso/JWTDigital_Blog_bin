=== Plugin Name ===
Contributors: Tim Heuer
Tags: silverlight, microsoft, tim heuer, wpf
Requires at least: 2.0.2
Tested up to: 2.8.8
Stable tag: 1.0.9

Silverlight for WordPress allows a WordPress user to specify a Silverlight application (XAP) to embed within their content easily.

== Description ==

Microsoft Silverlight is a browser plugin for enabling rich internet and media applications.  This plugin makes it easy for WordPress content authors
to add Silverlight applications/content to their blog posts and/or pages using a simple command to specify the location of the Silverlight 
application (XAP file) as well as the width, height and minimum version required for the runtime.

Special contributor note:
Juergen Oberngruber and Peter Loebel had created beta versions of a WordPress plugin that inspired this updated version.  Credit goes to them for taking the first ventures in this path!

== Installation ==

1. Extract all files and copy it to your plugins directory (/wp-content/plugins/).
2. Login to Wordpress Admin and activate the plugin.
3. Goto the Settings area and update your prefered default values for width, height and minimum version.
    - Standard Root Location: a location where XAP files may be stored if not providing the absolute URI to the XAP file
    - Standard Width: the default width of the Silverlight plugin
    - Standard Height: the default height of the Silverlight plugin
    - Standard Version: the minimum required Silverlight version required

A silverlight application can be embedded in a post using a tag of the following form:

[silverlight: URL]

e.g. [silverlight: app.xap]

You can also override the default dimensions:

[silverlight: URL, WIDTH, HEIGHT]

e.g. [silverlight: app.xap, 400, 300]

If you need to provide initParams they must be the fourth param and delimited with a "#" tag

e.g. [silverlight: app.xap, 400, 300, foo=bar#second=true#test=1]

You can also provide the minimum runtime version:

[silverlight: URL, WIDTH, HEIGHT, MINVER]

e.g. [silverlight: app.xap, 400, 300, foo=bar#second=true#test=1, 2.0.31005.0]

== Frequently Asked Questions ==

= Does this work with Silverlight 1.0 applications? =

No, this currently works with Silverlight 2+ applications that use the XAP packaging model.

== Screenshots ==

== Support ==
For support visit http://timheuer.com/silverlight-for-wordpress or contact Tim directly at tim@timheuer.com.