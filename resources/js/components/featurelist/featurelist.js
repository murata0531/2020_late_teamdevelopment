// import React from 'react';
// import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Feature_List extends Component {
    render() {

        return (

            <div className="main-menu">
                <div className="main-contents">
                    <div className="my-header">
                        <h2>基本管理</h2>
                    </div>
                    <div className="account-settings">
                        <section className="my-header-items-section">
                            
                        </section>
                        
                    </div>
                    <div className="main-item">
                        <div className="btn-dsn"><button type="submit" name="action">　<i class="far fa-edit"></i>編集　</button></div>
                        {/* <div className="list">
                            <div className="input-list">
                                <label for="com-name" className="label">企業名</label>
                                <input type="text" id="com-name" className="input-des"></input>
                            </div>
                            <div className="input-list">
                                <label for="com-url" className="label">企業URL</label>
                                <input type="url" id="com-url" className="input-des"></input>
                            </div>
                            <div className="input-list">
                                <label for="mana-email" className="label">管理用メールアドレス</label>
                                <input type="email" id="mana-email" className="input-des"></input>
                            </div>
                            <div className="input-list">
                                <label for="mana-pass" className="label">管理パスワード</label>
                                <input type="password" id="mana-pass" className="input-des"></input>
                            </div>
                            <div className="input-list">
                                <label for="com_pass" className="label">企業パスワード</label>
                                <input type="password" id="com_pass" className="input-des"></input>
                            </div>
                        </div> */}
                        <table border="0" >
                            <tr>
                                <td className="position"><label for="com-name" className="label">企業名</label></td>
                                <td><input type="text" id="com-name" className="input-des"></input></td>
                            </tr>
                            <tr>
                                <td className="position"><label for="com-url" className="label">企業URL</label></td>
                                <td><input type="url" id="com-url" className="input-des"></input></td>
                            </tr>
                            <tr>
                                <td className="position"><label for="mana-email" className="label">管理用メールアドレス</label></td>
                                <td><input type="email" id="mana-email" className="input-des"></input></td>
                            </tr>
                            <tr>
                                <td className="position"><label for="mana-pass" className="label">管理パスワード</label></td>
                                <td><input type="password" id="mana-pass" className="input-des"></input></td>
                            </tr>
                            <tr>
                                <td className="position"><label for="com_pass" className="label">企業パスワード</label></td>
                                <td><input type="password" id="com_pass" className="input-des"></input></td>
                            </tr>
                        </table>
                    </div>                        
                </div>
            </div>
        )
    }
}

if (document.getElementById('feature_list')) {
    ReactDOM.render(<Feature_List/>, document.getElementById('feature_list'));
}
