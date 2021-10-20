import { Injectable, Injector } from '@angular/core';
import { GlobalService } from '../global.service';

@Injectable({
  providedIn: 'root'
})
export class ImoveisService extends GlobalService{

  constructor(protected injector: Injector) { 
      super("http://127.0.0.1:8080/api/imoveis", injector)
  }
}

