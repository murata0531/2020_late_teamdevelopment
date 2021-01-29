// import React from 'react';
// import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Account extends Component {
    render() {

        
        return (

            <div className="main-menu">
                <div className="main-contents">
                    <div className="account-my-header">
                        <button type="button" onClick={
                            function(){
                                javascript:window.history.back(-1);return false;
                            }
                        }><i className="fas fa-angle-left"></i></button>
                    </div>
                    <div className="account-main-item">
                        <h2>アカウント情報の編集</h2>
                        <div className="input-edit">
                            <table border="0" className="input-table">
                                <tr>
                                    <td className="td-title"><i className="far fa-envelope"></i>　メールアドレス</td>
                                    <td className="td-input"><input type="email" value={userinfo.email} readOnly></input></td>
                                </tr>
                                <tr>
                                    <td className="td-title"><i className="far fa-user"></i>　名前</td>
                                    <td className="td-input"><input type="text" value={userinfo.name} readOnly></input></td>
                                </tr>
                                <tr>
                                    <td className="td-title"><i className="fas fa-key"></i>　パスワード</td>
                                    <td className="td-input"><input type="password" minLength="8"  value="**********" readOnly></input></td>
                                </tr>
                                
                                <tr><button><a href="/accountedit">アカウントを編集する</a></button></tr>
                            </table>
                            <div className="img-edit">
                                <div className="img-show"><img src={userinfo.icon}></img></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('account')) {
    ReactDOM.render(<Account_Edit />, document.getElementById('account'));
}
