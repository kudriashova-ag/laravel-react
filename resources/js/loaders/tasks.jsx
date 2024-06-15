
import { api } from "../api/api";

export const getTasks = async ({ params }) => { 
    const response = await api.get("project/" + params.id);
    return response.data;
}