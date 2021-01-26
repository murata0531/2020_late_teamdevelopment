import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Home from './home/home.js';
import Talk from './talk/talk.js';
import File_Sharing from './filesharing/filesharing.js';


export default class App extends Component {
    render() {
        return (

            <Router>
                <div>

                    <Switch>
                        <Route path="/home" exact component={Home} />
                        <Route path="/home/talk" component={Talk} />
                        <Route path="/home/file" component={File_Sharing} />

                    </Switch>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}