import React, { Component } from 'react';


class Booklist extends Component {

    constructor(props) {
        super(props)
    }

render() {
    return(
        <div>
            <section className="row-section">
                <div className="container">
                    <div className={'row'}>
                        { this.props.books.map((item,index)=> 
                                <div className="col-md-10 offset-md-1 row-block" key={index}>
                                    <ul id="sortable">
                                        <li>
                                            <div className="media">
                                                <div className="media-left align-self-center">
                                                    <img 
                                                         src={item.image} alt={'cover'}/>
                                                </div>
                                                <div className="media-body">
                                                    {item.title !== undefined &&
                                                        <h4>{item.title}</h4>}
                                                    <p>{item.authors}</p>
                                                    <p>Published on {item.publishedDate}</p>
                                                    {item.publisher  &&
                                                    <p>by {item.publisher}</p>}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>)
                        }
                    </div>
                </div>
            </section>
        </div>
        )
    }
}

export default Booklist