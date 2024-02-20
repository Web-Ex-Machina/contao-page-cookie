# Contao Page Cookie
This bundle adds a page protection by cookie to Contao Open Source CMS. It means a page cannot been reached until the device does not have a specific cookie. This bundle also provides the ability to generate that cookie, using Contao Forms. 

## Install
Use composer to install this bundle: `composer require webexmachina/contao-page-cookie`

Or simpler: use the Contao Manager.

## Bundle configuration
1. Create the usual structure of forms and pages inside Contao
2. Inside the form, check the "Generate a cookie" checkbox
3. Fill values as needed. Note that there is two options, a cookie can be generated directly when the form is submitted or when the GET token is catched in the URL.
4. Check the box for the page you want to protected and indicate the cookie name you put inside the form.
5. That's it! The page is now protected by a cookie.

## Notification Center
This bundle extends a little bit the tokens from Notification Center `core_form` notification. You can use the following tokens:
* `cpcCookie_name` - The cookie name
* `cpcCookie_value` - The cookie value
* `cpcCookie_duration` - The cookie duration
* `cpcCookie_token` - The cookie token

With the cookie token, you just have to add it as an URL argument, like `{{link_url::x}}?cpc_cookieToken=##cpcCookie_token##`. Since the cookie detection is on the `initializeSystem` hook, every page can validate the cookie. So you can redirect directly to the page you want to protect.

## Useful links
You can consult the [Changelog](CHANGELOG.md) here or submit issues in the [Github section](https://github.com/Web-Ex-Machina/contao-page-cookie/issues).

## Possible enhancements
* Use php session instead of database query to retrieve last form cookie generated (and pass the token to use as cookie value)
* Add a cronjob to remove FormCookie entries (because either they have been already generated or they are not valid anymore)
* Apply cookie protection behavior to every protected element, and not only pages
* Add English translations
* Allow settings to use dynamic vars from the data sent through the form