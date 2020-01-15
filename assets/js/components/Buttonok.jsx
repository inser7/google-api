import React, { Component } from 'react';


class Buttonext extends Component {

    constructor(props) {
        super(props)
    }

    render(){ 
        if (this.props.isFormFired) {
            return  (
                <div className="col-12 mt-2">
                    <div>
                        <button className={'btn btn-large btn-block btn-primary'} onClick = {this.props.onButtonNextClick}>
                            Load more
                        </button>
                    </div>
                    <div className="col text-center">
                        page { this.props.page }
                    </div>
                </div>
            );
        }

        return (<div></div>);
    }
    
}

export default Buttonext