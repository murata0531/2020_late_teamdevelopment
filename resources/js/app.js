/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// require('./components/Example');
// require('./components/filesharing/filesharing');
// require('./components/talk/talk');
require('./components/App');
require('./components/CompanyApp');


window.addEventListener('load', () => {
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/sw.js').
        then(() => {
          console.log('ServiceWorker registered')
        }).
        catch((error) => {
          console.warn('ServiceWorker error', error)
        })
    }
  })