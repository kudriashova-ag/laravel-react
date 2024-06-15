import React from 'react';
import { useLoaderData } from "react-router-dom";

const TaskList = () => {
    const {tasks} = useLoaderData();
    return (
        <div>
            {tasks.map(task => <div key={task.id}>{task.name}</div>)}
        </div>
    );
}

export default TaskList;
