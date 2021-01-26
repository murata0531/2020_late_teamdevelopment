import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Home extends Component {
    render() {
        return (

            <div className="main-menu">
                <div className="main-contents">
                    <div className="my-header">
                        <h2>ホーム</h2>
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
                        <h2>最近の更新</h2>
                        <div className="day">
                            <div className="updated-report">
                                <p className="date">2021年1月18日(月)</p>
                                <div className="updated-detail">
                                    <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                    <div className="updated-content">
                                        <p className="updated-chara">山田太郎さんが<button type="submit" name="action">　<i class="fas fa-book-open"></i>ノート　</button>を編集</p>
                                        <div className="updated-feature">
                                            <p className="note-name">ノート名：</p>
                                                <div className="note">
                                                    <span className="note-content">編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト</span>
                                                    <div className="btn-dsn"><button type="submit" name="action"　className="more-read">　もっと読む　<i className="fas fa-angle-double-down"></i></button></div>

                                                </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div className="edited-ago">2ヶ月前</div>
                                </div>
                            </div>
                            <div className="updated-report">
                                {/* <p className="date">2021年1月18日(月)</p> */}
                                <div className="updated-detail">
                                    <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                    <div className="updated-content">
                                        <p className="updated-chara">山田太郎さんが<button type="submit" name="action">　<i class="fas fa-book-open"></i>ノート　</button>を編集</p>
                                        <div className="updated-feature">
                                            <p className="note-name">ノート名：</p>
                                                <div className="note">
                                                    <span className="note-content">編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト</span>
                                                    <div className="btn-dsn"><button type="submit" name="action"　className="more-read">　もっと読む　<i className="fas fa-angle-double-down"></i></button></div>

                                                </div>
                                        </div>
                                    </div>
                                    <div className="edited-ago">2ヶ月前</div>
                                </div>
                                
                            </div>
                        </div>

                        <div className="day">
                            <div className="updated-report">
                                <p className="date">2021年1月18日(月)</p>
                                <div className="updated-detail">
                                    <img src="" width="50" height="50" class="rounded-circle align-middle img-responsive float-left"></img>
                                    <div className="updated-content">
                                        <p className="updated-chara">山田太郎さんが<button type="submit" name="action">　<i class="fas fa-book-open"></i>ノート　</button>を編集</p>
                                        <div className="updated-feature">
                                            <p className="note-name">ノート名：</p>
                                                <div className="note">
                                                    <span className="note-content">編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト編集したサンプルテキスト</span>
                                                    <div className="btn-dsn"><button type="submit" name="action"　className="more-read">　もっと読む　<i className="fas fa-angle-double-down"></i></button></div>

                                                </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div className="edited-ago">2ヶ月前</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('home')) {
    ReactDOM.render(<Arael_Home/>, document.getElementById('home'));
}
