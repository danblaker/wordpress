=== Plugin Name ===
Contributors: tipiirai
Tags: forum, commenting, realtime
Requires at least: 3.5.1
Tested up to: 3.6
Stable tag: 2.0.0
License: MIT
License URI: https://github.com/moot/wordpress/blob/master/LICENSE.txt

Realtime forums and commenting for Wordpress.

== Description ==

Moot offers many benefits for a Worpress site:

- **Full featured forums** makes your site conversational and draws more traffic.
- **Flat or threaded commenting** for small or big topics.
- **Unified** system for both forums and commenting. In or outside Wordpress.
- **Realtime**. Forget page reloads: posts, replies, likes and users appear in realtime.
- **Focus on content**. Moot user interface is clean, uncluttered and linear.
- **Single Sign-On**. Use the Wordpress login, users and avatars.
- **Spam filtering**, email notifications and 20+ different language versions

[Learn more...](https://moot.it)

= Installation =

1. Download and unzip the zip file to `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. [Setup a new forum](https://moot.it/setup) if you haven't done it already
5. Provide the forum name and other configuration from the plugin settings

= Commenting =

Toggle *Use Moot commenting on posts* checkbox from the settings to replace Wordpress commenting with Moot.

= Shortcodes =

Following shortcodes are provided on any page. These override the automatically generated commenting on a post.

- `[moot]` enable flat commenting
- `[moot forum="true"]` enable forums
- `[moot threaded="true"]` enable threaded commenting
- `[no-moot]` disable the automatically installed commenting
- `[moot path="/wordpress"]` enable commenting with on a specified [path](https://moot.it/docs/getting-started.html#paths)

You can also setup moot with HTML as follows:

`<a href="https://moot.it/i/[forumname]/my-path:with-key" id="moot">My commenting</a>`

It's important to understand how [paths](https://moot.it/docs/getting-started.html#paths) work.

If you have enabled single sign on from the settings it takes effect on all the forum and commenting instances.


== Screenshots ==

1. Commenting
2. Forums


