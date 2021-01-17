import React from 'react';
import ReactDOM from 'react-dom';

export default class Example extends React.Component {
    render() {
        return (

            <div class="main-menu">
                <div class="folder-menu">
                    <div class="search-back"><input type="text" class="search-text" placeholder=" &#xf002; キーワードを入力"></input></div>
                    <ul class="folder-list">
                        <li>
                            <div class="user-icon"><i class="far fa-user"></i></div>
                            <div class="user-text">
                                <div class="user-message-info">
                                    <span id="user-name">開発部長</span><span id="day">昨日</span>
                                </div>
                                <div class="inner-circle">
                                    <input type="text" value="おはよう御座います"></input> 
                                    <p class="circle">7</p>
                                </div>             
                            </div>              
                        </li>
                        <li>
                            <div class="user-icon"><i class="far fa-user"></i></div>
                            <div class="user-text">
                                <span>開発部長</span><span class="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div class="ufilesharering-ser-icon"><i class="far fa-user"></i></div>
                            <div class="user-text">
                                <span>開発部長</span><span class="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div class="user-icon"><i class="far fa-user"></i></div>
                            <div class="user-text">
                                <span>開発部長</span><span class="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div class="user-icon"><i class="far fa-user"></i></div>
                            <div class="user-text">
                                <span>開発部長</span><span class="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        <li>
                            <div class="user-icon"><i class="far fa-user"></i></div>
                            <div class="user-text">
                                <span>開発部長</span><span class="date">昨日</span><br></br>
                                <input type="text" value="おはよう御座います"></input>              
                            </div>              
                        </li>
                        
                    </ul>
                </div>
                <div class="main-contents">
                    <div class="main-header">
                        <div class="my-header">
                            <div class="my-header-title">
                                <p>トーク</p>
                                <p>グループ名</p>
                            </div>  
                            <div class="my-header-items">

                                <p>a</p>
                                <p>s</p>
                            </div>
                        </div>
                        <div class="account-settings"></div>
                    </div>
                    <div class="main-item">
                        {/* 会話部分 */}
                        <div class="opponent">
                            <div class="faceicon">
                                <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                <p class="name font-weight-bold m-0">開発部長</p>
                                <div class="message_box m-2">
                                    <div class="message_content p-3">
                                    <div class="message_text">message</div>
                                    </div>
                                </div>
                                <p class="dateTime float-right">2019</p>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
