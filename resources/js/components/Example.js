import React from 'react';
import ReactDOM from 'react-dom';

export default class Example extends React.Component {
    render() {
        return (

            <div>
               <div className="box2"><p>box2</p></div>
               <div className="box3">box3</div>
                <div className="box4">
                    <div className="box5">box5</div>
                    <div className="box6">box6</div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
