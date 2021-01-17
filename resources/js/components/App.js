import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Talk from './talk/talk.js';



export default class App extends Component {
    render() {
        return (

            <Router>
                <div>

                    <Switch>
                        <Route path="/home" exact component={Home} />
                        <Route path="/talk" component={Talk} />

                    </Switch>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}