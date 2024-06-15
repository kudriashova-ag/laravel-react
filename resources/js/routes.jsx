import {createBrowserRouter} from "react-router-dom";
import App from "./app";
import TaskList from "./components/TaskList";
import { getTasks } from "./loaders/tasks";

export const routes = createBrowserRouter([
    {
        path: "/",
        element: <App />,
        children: [
            {
                path: "/project/:id",
                element: <TaskList />,
                loader: getTasks,
            },
        ],
    },
]);