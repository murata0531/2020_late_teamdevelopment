import React from 'react';
import ReactDOM from 'react-dom';

export default class Example extends React.Component {
    render() {
        return (

            <div className="main-menu">
               <div className="folder-menu"><p>フォルダメニュー</p></div>
               <div className="main-contents">
                    <div className="main-header"><p>メインヘッダー</p></div>
                    <div className="main-item"><p>メインアイテム</p></div>
               </div>
            </div>
        )
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
