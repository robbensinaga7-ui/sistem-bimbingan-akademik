import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './app.jsx';
import '../css/app.css';

if (document.getElementById('app')) {
    ReactDOM.createRoot(document.getElementById('app')).render(
        <React.StrictMode>
 <App />
        </React.StrictMode>
    );
}