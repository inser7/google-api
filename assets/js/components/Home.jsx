import React, {Component} from 'react';
import {Route, Switch,Redirect, Link, withRouter} from 'react-router-dom';
import Main from './Main';
import Search from './Search/Search';
    
class Home extends Component {
    
    render() {
        return (
           <div>
               <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                   <Link className={"navbar-brand"} to={"/"}> Symfony React Project </Link>
                   <div className="collapse navbar-collapse" id="navbarText">
                   </div>
               </nav>
               <Switch>
                   <Redirect exact from="/" to="/main" />
                   <Route path="/main" component={Main} />
                   <Route path="/search" component={Search} />
               </Switch>
           </div>
        )
    }
}
    
export default Home;