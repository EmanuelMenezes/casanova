import { Injectable, Injector } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({ providedIn: 'root' })
export abstract class GlobalService {
    protected http: HttpClient;
    constructor(
        protected apiPath: string,
        protected injector: Injector
    ) { }

    getAll() {
        return this.http.get(this.apiPath);
    }

    getById(id: string) {
        return this.http.get(`${this.apiPath}/single_read.php?id=${id}`);
    }

    create(params: any) {
        return this.http.post(`${this.apiPath}/create.php`, params);
    }

    update(id: string, params: any) {
        return this.http.put(`${this.apiPath}/update.php?id=${id}`, params);
    }

    delete(id: string) {
        return this.http.delete(`${this.apiPath}/delete.php?id=${id}`);
    }
}