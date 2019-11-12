import React, { Component } from "react";
import ReactDOM from "react-dom";
import styled from "styled-components";

<<<<<<< HEAD
const Myheader = styled.h1`
    color: red;
`;
=======
const MyHeader = styled.h1`
    color: red;
`;

>>>>>>> 5de66a32f36e572b13eea7ca03b14f8b7ea60bfe
export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>
<<<<<<< HEAD
                            <Myheader>
                                styled-components + react are adding in this
                                website
                            </Myheader>
                            <h1>hi</h1>
=======
                            <MyHeader>
                                styled-components have accessed to this website
                                !
                            </MyHeader>
>>>>>>> 5de66a32f36e572b13eea7ca03b14f8b7ea60bfe
                            <div className="card-body">
                                I'm an example component!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
