import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Function_Management from './functionmanagement/functionmanagement.js'


export default class CompanyApp extends Component {
    render() {
        return (

            <Router>
                <div>

                    <Switch>
                        <Route path="/home/talk" component={Talk} />
                        <Route path="/home/file" component={File_Sharing} />

                    </Switch>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('companyapp')) {
    ReactDOM.render(<CompanyApp />, document.getElementById('companyapp'));
}