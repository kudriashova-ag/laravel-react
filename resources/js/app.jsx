import React from 'react';
import "./app.css";

import { NavLink, Outlet } from "react-router-dom";

const App = () => {
    const projects = JSON.parse(document.getElementById('root').dataset.projects);
    return (
        <div>
            <h1>React app</h1>
            {projects.map(project => <div key={project.id}>
                <NavLink to={`/project/${project.id}`}>{project.name}</NavLink>
            </div>)}

            <Outlet />
        </div>
    );
}
 
export default App;
