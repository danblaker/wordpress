=== Plugin Name ===
- Contributors: tipiirai
- Tags: comments, spam
- Requires at least: 3.5.1
- Tested up to: 3.6
- Stable tag: 1.0.0
- License: MIT
- License URI: https://github.com/moot/wordpress/blob/master/LICENSE.txt

Realtime forums and commenting for Wordpress. A modern and clean alternative.
This plugin is currently in beta and the official release will be on August 2013.

## == Description ==

Moot offers various benefits for a Worpress site. Most notably:

- **Full featured forums** for any Wordpress site. This will make your site conversational and draws more traffic to your site.
- **Flat or threaded commenting**. For small or big topics.
- **Unified** Same system for both forums and commenting. Same system in Wordpress and outside Wordpress.
- **Realtime**. Forget page reloads: posts, replies, likes and users appear in realtime.
- **Focus on content** Moot user interface is clean, uncluttered and linear.
- **Single Sign-On** Use the Wordpress login, users and avatars.
- Spam filtering, email notifications and 20+ different language versions

Learn more from Moot website: https://moot.it

## == Usage ==

Check *Use Moot commenting on posts* from the settings if you simply want to replace Wordpress commenting with Moot. Alternatively you can use the various shortcodes on the content to manually enable or disable Moot commenting:

### Shortcodes

- `[moot]` enable flat commenting
- `[moot forum="true"]` enable forums
- `[moot threaded="true"]` enable threaded commenting
- `[no-moot]` disable the automatically installed commenting
- `[moot path="/wordpress"]` enable commenting with on a specified [path](https://moot.it/docs/getting-started.html#paths)

The shortcodes always override the automatically generated commeting. You can also setup moot with pure HTML as follows

`<a href="https://moot.it/i/[forumname]/my-path:with-key" id="moot">My commenting</a>`

In which case you need to understand how [paths](https://moot.it/docs/getting-started.html#paths) work.

If you have enabled single sign on from the settings it takes effect on all the forum and commenting instances.


## == Installation ==

1. Download the zip file: https://github.com/moot/wordpress/archive/master.zip to `/wp-content/plugins/` directory
2. Unzip the file and rename the `wordpress-master` folder to `moot`
3. Activate the plugin through the 'Plugins' menu in WordPress
4. [Setup a new forum](https://moot.it/setup) if you haven't already and input the forum name from the plugin settings.


