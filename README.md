# Animated timeline plugin

This WordPress plugin extends the core Group block to create an animated timeline experience with subtle animation and considerations for [`prefers-reduced-motion`](https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-reduced-motion) respecting a visitors preference for non-essential motion.

The final pattern is registered within the plugin, but it could also potentially be included directly in a custom WordPress theme. It can also be found on the WordPress Pattern Directory as [Vertical Timeline](https://wordpress.org/patterns/pattern/vertical-timeline/).

There are two possible styling variations: `animated-timeline` and `animated-timeline animated-timeline--circles`.

The accompanying post resides on the WordPress Developer Blog: [__How to create an animated timeline plugin__](https://developer.wordpress.org/news/2024/06/13/how-to-create-an-animated-timeline-plugin/).

## How to use

1. Download this plugin as a zip (click on 'Code' and choose 'Download ZIP')
2. Place the un-zipped directory in your WordPress `wp-content/plugins` directory
3. Activate the plugin
4. Create a new post / page and add the 'Animated Timeline' pattern.
5. Save and preview the final animated timeline.
6. Try editing the Advanced -> Additional CSS Classes from `animated-timeline` to `animated-timeline animated-timeline--circles` for the overall pattern's parent Group block to see the circle variation.

Feel free to fork it and use it however you like!

## Changelog

### June 11, 2024 - v1.0.0

Initial launch.
