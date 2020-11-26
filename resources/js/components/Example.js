import React from 'react';
import ReactDOM from 'react-dom';

export default class Example extends React.Component {
    render() {
        return (

            <div className="main-menu">
                <div className="folder-menu">
                    <input type="text" className="search-text" placeholder=" &#xf002; キーワードを入力"></input>
                    <ul className="folder-list">
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <span>開発部長</span><span className="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input> 
                                <span className="maru size_normal pink1">
                                    <span class="letter3">7</span>
                                </span>             
                            </div>              
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <span>開発部長</span><span className="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <span>開発部長</span><span className="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <span>開発部長</span><span className="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <span>開発部長</span><span className="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <span>開発部長</span><span className="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        
                    </ul>
                </div>
                <div className="main-contents">
                    <div className="main-header">
                        <div className="my-header">
                            <p>トーク</p>
                            <p>グループ名</p>
                        </div>
                        <div className="account-settings"></div>
                    </div>
                    <div className="main-item"><p>メインアイテム</p></div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
