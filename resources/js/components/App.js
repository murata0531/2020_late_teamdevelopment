import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Home from './home/home.js';
import Talk from './talk/talk.js';
import File_Sharing from './filesharing/filesharing.js';
import Account_Edit from './accountedit/accountedit.js'

export default class App extends Component {
    render() {
        return (

            <Router>
                <div>

                    <Switch>
                        <Route path="/home" exact component={Home} />
                        <Route path="/home/talk" exact component={Talk} />
                        <Route path="/home/file" exact component={File_Sharing} />
                        <Route path="/home/account" exact component={Account_Edit} />

                    </Switch>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}