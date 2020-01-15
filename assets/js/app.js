import React, { Component } from 'react';
import ReactDom from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import '../css/app.css';
import Home from './components/Home';
    


class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <Home/>
            </BrowserRouter>
        )
    }
}

ReactDom.render(<App />, document.getElementById('root'));