import React from 'react';
import ReactDOM from 'react-dom';

export default class Example extends React.Component {
    render() {
        return (

            <div>
                <header className="header">

                    <h1 className="site-title">
                        < a href="./">クリ★スタ</a>
                    </h1>
                    {/*ナビゲーションバー*/}
                    <div className="nav-wrapper">
                        <nav className="header-nav">
                            <div>
                                <ul className="nav-list">
                                    <li className="nav-item"><a href="#about">About</a></li>
                                    <li className="nav-item"><a href="#blog">New</a></li>
                                    <li className="nav-item"><a href="#blog">Access</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
            </div>
        )
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
