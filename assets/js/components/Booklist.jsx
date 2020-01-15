import React, { Component } from 'react';


class Booklist extends Component {

    constructor(props) {
        super(props)
    }

    render() {
        return (
            <div className={'row'}>
                {this.props.books.map((item,index)  =>
                    <div key={index} className="col-lg-3 col-sm-6 mt-2 mb-2">
                        <div className="card-header">
                            {item.title !== undefined &&
                            <h2>{item.title}</h2>
                            }
                        </div>
                        <div className="card">
                            <img src={item.image} className="card-img-top" alt={'cover'}/>
                            <div className="card-body">
                                <i>{item.authors}</i>
                                <div>Published on {item.publishedDate}</div>
                                {item.publisher !== undefined &&
                                <div> by {item.publisher}</div>
                                }
                            </div>
                        </div>
                    </div>
                )}
            </div>
        )
    }


}

export default Booklist