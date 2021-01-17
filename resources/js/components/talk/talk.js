// import React from 'react';
// import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Talk extends Component {
    render() {

    
        return (

            <div className="main-menu">
                <div className="folder-menu">
                    <div className="search-back"><input type="text" className="search-text" placeholder=" &#xf002; キーワードを入力"></input></div>
                    <ul className="folder-list">
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div className="user-icon"><i class="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list"><span className="person">開発部長</span><span className="date">昨日</span></div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                    <p className="talk-circle">7</p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div className="main-contents">
                    <div className="my-header">
                        <div className="my-header-title">
                            <h5>トーク</h5>
                            <h6>グループ名</h6>
                        </div>
                        <div className="my-header-items">
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i class="fas fa-phone-alt"></i></a>
                                <p onClick={
                                    function () {

                                    }
                                }>通話</p>
                            </section>
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i class="fas fa-video"></i></a>
                                <p>ビデオ通話</p>
                            </section>
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i class="fas fa-bars"></i></a>
                                <p>メニュー</p>
                            </section>
                        </div>
                    </div>
                    <div className="account-settings">
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i class="far fa-user"></i></a>
                            <p>アカウント</p>
                        </section>
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i class="far fa-bell"></i></a>
                            <p>通知</p>
                        </section>
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i class="fas fa-cog"></i></a>
                            <p>設定</p>
                        </section>
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i class="far fa-question-circle"></i></a>
                            <p>ヘルプ</p>
                        </section>
                    </div>
                    <div className="main-item">
                        <div id="messageLine" className="p-2">

                            {/* <!-- 会話挿入空間 --> */}
                            <div class="opponent">
                                {/*相手*/}
                                <div class="faceicon">
                                    <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                    {/* <p className="name font-weight-bold m-0">開発部長</p> */}
                                    <div className="flex-col">
                                        <div className="flex-row">
                                            <p className="name font-weight-bold m-0">開発部長</p>
                                            <p class="dateTime float-right">2019</p>
                                        </div>
                                        <div class="message_box m-2">
                                            <div class="message_content p-3">
                                                <div class="message_text">おはよう御座います。</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                {/*自分*/}
                                <div class="my-faceicon">
                                    <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                    <div className="flex-col">
                                        <div className="flex-row">
                                            <p className="name font-weight-bold m-0">自分</p>
                                            <p class="dateTime float-right">2019</p>
                                        </div>
                                        <div class="message_box m-2">
                                            <div class="message_content p-3">
                                                <div class="message_text">おはよう御座います。おはよう御座います。こちらサンプルテキストです。おはよう御座います。こちらサンプルテキストです。おはよう御座います。こちらサンプルテキストです。</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="my-faceicon">
                                    <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                    <div className="flex-col">
                                        <div className="flex-row">
                                            <p className="name font-weight-bold m-0">自分</p>
                                            <p class="dateTime float-right">2019</p>
                                        </div>
                                        <div class="message_box m-2">
                                            <div class="message_content p-3">
                                                <div class="message_text">おはよう御座います。おはよう御座います。こちらサンプルテキストです。おはよう御座います。こちらサンプルテキストです。おはよう御座います。こちらサンプルテキストです。</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                </div>
                                {/*相手*/}
                                <div class="faceicon">
                                    <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                    {/* <p className="name font-weight-bold m-0">開発部長</p> */}
                                    <div className="flex-col">
                                        <div className="flex-row">
                                            <p className="name font-weight-bold m-0">開発部長</p>
                                            <p class="dateTime float-right">2019</p>
                                        </div>
                                        <div class="message_box m-2">
                                            <div class="message_content p-3">
                                                <div class="message_text">おはよう御座います。</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>  
                            </div>
                        </div>

                        {/* </div> */}

                        {/* 会話部分ここまで↑ */}
                        
                        {/* 会話送信部分ここから */}

                        <div id="send">
                            {/* ここにテキストエリアや送信ボタンを作る */}
                            <div id="send-text">
                                <textarea></textarea>
                                <div id="message-list">
                                    <i class="fas fa-wrench"></i>
                                    <i class="fas fa-paperclip"></i>
                                    <i class="fas fa-at"></i>
                                    <i class="fas fa-image"></i>
                                </div>
                            </div>

                            <button type="submit" id="send-button"><i class="fab fa-telegram-plane"></i></button>               
                        </div>

                    </div>
                </div>
            </div>
        )
    }
}

// if (document.getElementById('talk')) {
//     ReactDOM.render(<Talk />, document.getElementById('talk'));
// }
