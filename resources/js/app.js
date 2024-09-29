import './bootstrap';
import Echo from "laravel-echo"

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-key',
    wsHost: window.location.hostname,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
});

window.Echo.channel("notificationChannel").listen("NotificationEvent",(e)=>{
    alert('success send notification');
})