import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Function_Management extends Component {
    render() {

        return (

            <div className="main-menu">
                <div className="main-contents">
                    <div className="my-header">
                        <h2>機能管理</h2>
                    </div>
                    <div className="account-settings">
                        <section className="my-header-items-section">
                            
                        </section>
                        
                    </div>
                    <div className="main-item">
                        <div className="function-management">
                            <table border="0" >
                                <tr className="tr-des">
                                    <td><i className="fas fa-tasks"></i>　タスク管理</td>
                                    <td><button type="submit" name="action">　<i class="fas fa-plus"></i>追加　</button></td>
                                </tr>
                                <tr>
                                <td><i className="far fa-comment-alt"></i>　トークチャット機能</td>
                                    <td><button type="submit" name="action">　<i class="fas fa-plus"></i>追加　</button></td>
                                </tr>
                                <tr>
                                <td><i className="fas fa-book-open"></i>　ノート・Wiki機能</td>
                                    <td><button type="submit" name="action">　<i class="fas fa-plus"></i>追加　</button></td>
                                </tr>
                                <tr>
                                <td><i className="far fa-folder"></i>　ファイル共有</td>
                                    <td><button type="submit" name="action">　<i class="fas fa-plus"></i>追加　</button></td>
                                </tr>
                                <tr>
                                <td><i className="fas fa-book"></i>　電子書籍ツール機能</td>
                                    <td><button type="submit" name="action">　<i class="fas fa-plus"></i>追加　</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>                        
                </div>
            </div>
        )
    }
}

if (document.getElementById('function_management')) {
    ReactDOM.render(<Function_Management/>, document.getElementById('function_management'));
}