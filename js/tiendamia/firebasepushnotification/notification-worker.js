
if (!firebase) {

    importScripts('https://www.gstatic.com/firebasejs/7.14.4/firebase-app.js');
    importScripts('https://www.gstatic.com/firebasejs/7.14.4/firebase-messaging.js');

    let firebaseConfig = {
        apiKey: "AIzaSyBD-fJxfeUNpLnRjZQ4-J6_MI9LPUrN6dM",
        authDomain: "tiendamiamagento.firebaseapp.com",
        databaseURL: "https://tiendamiamagento.firebaseio.com",
        projectId: "tiendamiamagento",
        storageBucket: "tiendamiamagento.appspot.com",
        messagingSenderId: "161304896690",
        appId: "1:161304896690:web:bbb5a3866ce55394dd15ab"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    messaging.setBackgroundMessageHandler(function (payload) {
        const notificationTitle = payload.notification.title;
        const notificationOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon
        };
        return self.registration.showNotification(notificationTitle,
            notificationOptions);
    });
}