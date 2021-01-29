import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import Feature_List from './featurelist/featurelist.js';
import Function_Management from './functionmanagement/functionmanagement.js';
import User_Management from './usermanagement/usermanagement.js';

export default class CompanyApp extends Component {
    render() {
        return (

            <Router>
                <div>

                    <Switch>
                        <Route path="/company/home" exact component={Feature_List} />
                        <Route path="/company/home/usermanagement" exact component={User_Management} />
                        <Route path="/company/home/functionmanagement" exact component={Function_Management} />
                    </Switch>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('companyapp')) {
    ReactDOM.render(<CompanyApp />, document.getElementById('companyapp'));
}